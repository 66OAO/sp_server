#include "ChannelServer.h"

#ifdef _DEBUG
#define DEBUG 0
#endif
Ini config("..\\config.ini", "CONFIG"); //For debug
//Ini config(".//config.ini", "CONFIG"); //For Running
HANDLE hConsoleOutput;

int main()
{

	streambuf* coutBuf = cout.rdbuf();
	ofstream of("packets.txt");
	streambuf* fileBuf = of.rdbuf();
	if (DEBUG)
	{
		cout.rdbuf(fileBuf);
	}
	//cout << hex << sizeof(QuestGainResponse) << endl;
	hConsoleOutput = GetStdHandle(STD_OUTPUT_HANDLE);

	ChannelServer *CS = new ChannelServer;

	config.SetSection("CHANNELS");
	u32 port = config.ReadInt("port", 9303);

	if (CS->Start(port))
	{
		Log::Out("----- Channel Server Started -----\n");
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