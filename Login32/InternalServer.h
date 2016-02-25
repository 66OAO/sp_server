#pragma once

#include <tbb/compat/thread>

class InternalServer {
public:
	InternalServer();
	~InternalServer();
	void Sstart() { m_thread = thread(&InternalServer::startServer, this); }
private:
	thread m_thread;
	WSADATA wsaData;
	struct sockaddr_in server, client;;
	SOCKET listen_socket, msg_socket;
	void startServer();
};