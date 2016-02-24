#ifndef CONSOLE_H
#define CONSOLE_H
#include <iostream>

static const void MakeMeFocused(char *output, bool type) {
	HANDLE hConsoleOutput = GetStdHandle(STD_OUTPUT_HANDLE);

	SetConsoleTextAttribute(hConsoleOutput,
		(type ? FOREGROUND_GREEN : FOREGROUND_RED) | FOREGROUND_INTENSITY);

	cout << output << endl;
	SetConsoleTextAttribute(hConsoleOutput, FOREGROUND_BLUE | FOREGROUND_GREEN | FOREGROUND_RED);
}

#endif // CONSOLE_H
