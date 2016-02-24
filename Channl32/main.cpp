#include "ChannelServer.h"
#include "ini.h"
#include <iostream>
#include <fstream>
#define DEBUG 0
CIni config("..\\config.ini", "CONFIG"); //For debug
//CIni config(".//config.ini", "CONFIG"); //For Running
HANDLE hConsoleOutput;

int main()
{

	streambuf* coutBuf = cout.rdbuf();
	ofstream of("D:\\packets.txt");
	streambuf* fileBuf = of.rdbuf();
	if (DEBUG)
	{
		cout.rdbuf(fileBuf);
	}
	srand(time(0));
	//cout << hex << sizeof(QuestGainResponse) << endl;
	hConsoleOutput = GetStdHandle(STD_OUTPUT_HANDLE);

	ChannelServer *CS = new ChannelServer;

	config.SetSection("CHANNELS");
	int32 port = config.ReadInteger("port", 9303);

	if (CS->Start(port))
	{
		printf("----- Channel Server Started -----\n");
	}
	CS->CommLoop();
	delete CS;

	cout << endl;
	if (DEBUG)
	{
		of.flush();
		of.close();
		cout.rdbuf(coutBuf);
	}
	cout << "Server Closing" << endl;
	cin.get();
	return 0;
}