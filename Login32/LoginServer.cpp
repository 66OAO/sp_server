#include "LoginServer.h"
#include "console.h"

extern Ini config;

cLoginServer::cLoginServer()
{
	//for (int i = 0; i < BUFFER_SIZE; i++)
	  //  buffer[i] = 0;

	serverlen = sizeof(server);
	clientlen = sizeof(client);
}

cLoginServer::~cLoginServer()
{
	WSACleanup();
}

bool cLoginServer::Start()
{
	if (WSAStartup(514, &wsaData))
	{
		Log::Error("WSAStartup Error");
		return false;
	}

	server.sin_family = 2;
	u16 port = config.ReadInt("port", 21000, "LOGIN");
	server.sin_port = htons(port);
	server.sin_addr.s_addr = 0;

	listen_socket = socket(2, 1, 0);

	if (listen_socket == INVALID_SOCKET)
	{
		Log::Error("listen_socket Error");
		return false;
	}

	if (::bind(listen_socket, (struct sockaddr*)&server, serverlen) == SOCKET_ERROR)
	{
		Log::Error("bind Error");
		return false;
	}
	else
		Log::Out("Game Login Server Listening on port {}", port);


	if (listen(listen_socket, SOMAXCONN) == SOCKET_ERROR)
	{
		Log::Error("Listen Error");
		return false;
	}

	return true;
}

void Comm(void *msg_sock)
{
	SOCKET msg_socket = (SOCKET)msg_sock;
	unsigned char buffer[2000];
	int retbufsize = 0;

	while (msg_sock)
	{
		retbufsize = recv(msg_socket, (char*)buffer, sizeof(buffer), 0);

		if (!retbufsize)
		{
			Log::Info("Connection closed by client");
			closesocket(msg_socket);
			break;
		}

		if (retbufsize == SOCKET_ERROR)
		{
			Log::Info("Client socket closed");
			closesocket(msg_socket);
			break;
		}
		else Log::Out("recv {} bytes", retbufsize);

		u32 sz = *(u32*)buffer;
		if (sz != retbufsize)
		{
			Log::Warning("sz != retbufsize ({} != {})", sz, retbufsize);
		}

		//outBuffer();
		try {
			PacketHandler PackHandle(buffer);
			if(PackHandle.nOfPackets) {
				Log::Info("Sending Response");
				retbufsize = send(msg_socket, (char*)buffer, PackHandle.ServerResponse(buffer)*buffer[0], 0);
			} else Log::Warning("Server has no response");
		} catch (const std::exception & e) {
			Log::Error("Error handling client packet: {}", e.what());
		}

	}
	_endthread();
}

bool cLoginServer::CommLoop()
{
	bool bExit = false;
	int retbufsize = 0;

	while (!bExit)
	{
		if ((msg_socket = accept(listen_socket, (struct sockaddr*)&client, &clientlen)) == INVALID_SOCKET)
		{
			Log::Error("Accept Error");
			return false;
		}
		else
			Log::Out("Accept Client: {}", inet_ntoa(client.sin_addr));
		_beginthread(Comm, 0, (void *)msg_socket);
	}

	return true;
}

void cLoginServer::outBuffer()
{
	/*
	printf("---- Recieved Data From %s  ----\n",inet_ntoa(client.sin_addr));

	for (int i = 0; i < buffer[0]; i++)
	{
		if (i && i%16 == 0)printf("\n");
		if (*(BYTE*)(buffer+i) < 0x10)printf("0");
		printf("%x ",(int)*(BYTE*)(buffer+i));
	}
	printf("\n");
	*/
}
