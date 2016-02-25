#include "InternalServer.h"

extern Ini config;

InternalServer::~InternalServer()
{
	WSACleanup();
}


void InternalServer::startServer() {
	int retbufsize = 0;

	while (true)
	{
		int clientLength = sizeof(client);
		if ((msg_socket = accept(listen_socket, (struct sockaddr*)&client, &clientLength) == INVALID_SOCKET))
		{
			Log::Error("Accept Error");
		}
		else
			Log::Out("Accept Channel Server: {}", inet_ntoa(client.sin_addr));
	}
}

InternalServer::InternalServer() {
	if (WSAStartup(514, &wsaData))
	{
		Log::Error("WSAStartup Error");
	}
	server.sin_family = 2;
	u16 port = config.ReadInt("internalPort", 22000, "LOGIN");
	server.sin_port = htons(port);
	server.sin_addr.s_addr = 0;

	listen_socket = socket(2, 1, 0);

	if (listen_socket == INVALID_SOCKET)
	{
		Log::Error("listen_socket Error");
	}

	//Bind
	if (::bind(listen_socket, (struct sockaddr*)&server, sizeof(server)) == SOCKET_ERROR)
	{
		Log::Error("Bind Error");
	}
	else
		Log::Out("Internal Server Listening on port {}", port);

	if (listen(listen_socket, SOMAXCONN) == SOCKET_ERROR)
	{
		Log::Error("Listen Error");
	}
}

