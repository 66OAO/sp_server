#include "MySQL.h"

extern Ini config;

MySQL::MySQL()
{
	config.SetSection("DB");
	auto ip = config.ReadString("ip", "127.0.0.1");
	u32 port = config.ReadInt("port", 3306);
	auto user = config.ReadString("user", "root");
	auto pw = config.ReadString("pw", "spgame");
	auto db = config.ReadString("db", "spgame");

	connection = mysql_init(0);
	if(mysql_real_connect(connection, ip.c_str(), user.c_str(), pw.c_str(), db.c_str(), port, 0, 0)) {
		my_bool reconnect = 1;
		mysql_options(connection, MYSQL_OPT_RECONNECT, &reconnect);
	} else {
		Log::Error("Unable to connect to MySQL server");
	}
}

MySQL::~MySQL()
{
	mysql_close(connection);
}

int MySQL::Login(char* id, char* pw)
{
	QuerySelect("SELECT usr_id FROM users WHERE usr_name = '{}' AND usr_pw = '{}'",
		id, pw);
	MYSQL_ROW result = mysql_fetch_row(res);
	if (!result)return 0;
	int x = atoi(result[0]);
	mysql_free_result(res);
	return x;
}

void MySQL::GetUserInfo(int id, MyCharInfo &info)
{
	QuerySelect("SELECT usr_char, usr_points, usr_code, usr_level FROM users WHERE usr_id = {}", id);

	MYSQL_ROW result = mysql_fetch_row(res);
	if (!result) return;
	info.DefaultCharacter = atoi(result[0]);
	info.Points = atoull(result[1]);
	info.Code = atoull(result[2]);
	info.Level = atoi(result[3]);
	if (info.Level > 0 && info.Level <= 12)
		info.UserType = 10;
	else if (info.Level > 12 && info.Level <= 16)
		info.UserType = 20;
	else if (info.Level > 16)
		info.UserType = 30;
	else info.UserType = 0;
	mysql_free_result(res);
	Level level;
	int l = level.getLevel(info.Points);
	if (info.Level != l) {
		Query("UPDATE users SET usr_level = {} WHERE usr_id = {}", l, id);
		info.Level = l;
	}
}

void MySQL::SetDefaultCharacter(int id, Character DefaultCharacter) {
	Query("UPDATE users SET usr_char = {} WHERE usr_id = {}", DefaultCharacter, id);
}