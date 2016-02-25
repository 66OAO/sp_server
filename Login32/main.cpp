#include "LoginServer.h"
#include "InternalServer.h"
Ini config("..\\config.ini", "CONFIG"); //For debug
//Ini config(".//config.ini", "CONFIG"); //For Running
HANDLE hConsoleOutput;

int main()
{
	hConsoleOutput = GetStdHandle(STD_OUTPUT_HANDLE);
	//printf("%x\n",sizeof(TrainingDoneResponse));
	cLoginServer *LoginServer = new cLoginServer;
	InternalServer *internalServer = new InternalServer;
	internalServer->Sstart();
	if (LoginServer->Start())
		printf("----- Server Started -----\n");

	LoginServer->CommLoop();
	delete LoginServer;

	printf("Server Closing\n");

	return 0;
}
