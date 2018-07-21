# AI Young website under django framework
## How to run the code
+ pip install Django==2.0.7
+ git clone https://github.com/ChengzhangZhu/AIYoung.git/
+ python manage.py runserver
## How to browse this website
After run the server, you can enter the following URLs: 
+ Team Member List: http://127.0.0.1:8000/team
+ Admin Management: http://127.0.0.1:8000/admin
	+ User Name: admin
	+ Password: chengzhang

## PHP developing environment deployment
1. 安装Netbeans + Wampserver
  A. Wampser: https://sourceforge.net/projects/wampserver/
  B. Netbeans: https://netbeans.org/
  C. Netbeans PHP Plugin：Toos>Plugins>Available Plugins>PHP
2. 找到Wampserver的www目录，用Netbeans该目录新建工程
3. 右键单击工程>Properties>Run Configuration>http://localhost/xxx(项目名称)/
4. Netbeans设置PHP调试端口：Toos>Options>PHP填写端口号
5. Wampserver设置调试端口：左键单击Wampserver，php设置里php.ini底部加入以下设置，端口号需与上面的一致
xdebug.remote_enable=on
xdebug.remote_handler=dbgp
xdebug.remote_host=localhost
xdebug.remote_port=9010
6. 导入mysql文件(AIYoung_PHP中aiyoung.sql)：启动Wampserver，左键点击Wampserver，进入phpAdmin，新建数据库"aiyoung"，修改数据库密码为“123”，然后导入aiyoung.sql
