创建用户表user_tb

user_id 学号/工号
user_type 用户类型(学生/老师)
user_name 姓名
user_college 学院(1材料学院2化工学院3信息学院4机械学院5文法学院6经管学院7生命学院8理学院)
user_phone 手机号
user_mail 邮箱
user_password 密码
user_status 用户状态(1正常2审核中3审核未通过)
user_login_status 用户登录状态（默认为0，登录后为1）

create table user_tb(
user_id varchar(32) NOT NULL,
user_type int(1) NOT NULL DEFAULT '3',
user_name varchar(32) NOT NULL,
user_college varchar(64) NOT NULL,
user_phone varchar(32) NOT NULL,
user_mail varchar(32) NOT NULL,
user_password varchar(32) NOT NULL DEFAULT '123456',
user_status int(1) NOT NULL DEFAULT '3',
user_login_status int(1) NOT NULL DEFAULT '0',
PRIMARY KEY(user_id)
);



=============================================================================================================================================================



实验室信息表lab_tb

lab_id 实验室id
lab_name 实验室名称
lab_grade 实验室等级(1国家级2一级3二级4普通)
lab_college 实验室所属学院(1材料学院2化工学院3信息学院4机械学院5文法学院6经管学院7生命学院8理学院)
lab_zone 实验室所属校区(1东校区2北校区3昌平校区)
lab_desc 实验室简介
lab_status 实验室状态(1正常2停用)

create table lab_tb(
lab_id varchar(32) NOT NULL,
lab_name varchar(64) NOT NULL,
lab_grade varchar(64) NOT NULL,
lab_college varchar(64) NOT NULL,
lab_zone varchar(32) NOT NULL,
lab_desc varchar(64) DEFAULT NULL,
lab_img varchar(64) DEFAULT NULL,
lab_status varchar(64) DEFAULT NULL,
PRIMARY KEY(lab_id)
);

AD101 A:东校区,D:楼的代号,101:门牌号

insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('AD101','计算机实验室','普通','信息学院','东校区','正常');
insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('AD201','计算机实验室','普通','信息学院','东校区','正常');
insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('AJ305','图形实验室','普通','信息学院','东校区','正常');
insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('AJ307','仿真实验室','普通','信息学院','东校区','正常');
insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('AS106','有机实验室','国家级','生命学院','东校区','正常');
insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('AK407','化学实验室','一级','化工学院','东校区','正常');
insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('AH307','光学材料实验室','二级','材料学院','东校区','正常');

insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('BS307','光学实验室','普通','理学院','北校区','正常');
insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('BS309','声学实验室','普通','理学院','北校区','正常');

insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('CX401','硬件实验室','一级','信息学院','昌平校区','正常');
insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_status) VALUES ('CX402','VR实验室','二级','信息学院','昌平校区','正常');


=============================================================================================================================================================

实验室预约表labreserve_tb

labreserve_id 实验室预约编号
labreserve_perName 预约者姓名 
labreserve_perId 预约者学号\工号
labreserve_perPhone 预约者电话
labreserve_perMail 邮箱
labreserve_lab_id 预约实验室编号
labreserve_date 预约实验室日期
labreserve_time 预约实验室时段(上午08:00-12：00 下午13:00-17:00 晚上18:00-22:00)
labreserve_reason 预约实验室原因
labreserve_equip 是否预约设备
labreserve_status 预约状态(1已提交审核中2成功3失败)
labreserve_report 预约报告


create table labreserve_tb(
labreserve_id varchar(32) NOT NULL ,
labreserve_perName varchar(32) DEFAULT NULL,
labreserve_perId varchar(32) NOT NULL,
labreserve_perPhone varchar(32) DEFAULT NULL,
labreserve_perMail varchar(64) DEFAULT NULL,
labreserve_lab_id varchar(32) DEFAULT NULL,
labreserve_date date DEFAULT NULL,
labreserve_time varchar(64) DEFAULT NULL,
labreserve_reason varchar(255) DEFAULT NULL,
labreserve_equip varchar(32) NOT NULL DEFAULT '是',
labreserve_status int(1) NOT NULL DEFAULT '1',
PRIMARY KEY(labreserve_id)
);

unix_timestamp(now())
insert into labreserve_tb (labreserve_id,labreserve_perId,labreserve_date,labreserve_time) VALUES (unix_timestamp(now()),'2013014153','2017-5-20','08:00-12:00');

==================================================================================================================================================================


设备信息表equip_tb

equip_id 设备编号
equip_name 设备名称
equip_model 设备型号
equip_lab_id 设备所属实验室id
equip_img 设备图片
equip_price 设备价格
equip_manu 生产厂商
equip_manuNo 出厂编号
equip_manuTime 出厂时间
equip_chaseTime 购入时间
equip_desc 设备简介
equip_status 设备状态(1正常2停用3null)

create table equip_tb(
equip_id varchar(32) NOT NULL,
equip_name varchar(64) NOT NULL,
equip_model varchar(255) DEFAULT NULL,
equip_lab_id varchar(32) NOT NULL,
equip_img varchar(64) DEFAULT NULL,
equip_price varchar(32) DEFAULT NULL,
equip_manu varchar(32) DEFAULT NULL,
equip_manuNo varchar(32) DEFAULT NULL,
equip_manuTime date DEFAULT NULL,
equip_chaseTime date DEFAULT NULL,
equip_desc varchar(255) DEFAULT NULL,
equip_status varchar(64) DEFAULT NULL,
PRIMARY KEY(equip_id)
equipP);

A14201000001 A:东校区,14:学院,2010:购入年份,00001:购入编号

insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime) VALUES ('A14201000001','计算机','DELL HY3','AD101',null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime) VALUES ('A14201000002','计算机','DELL HY3','AD101',null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000003','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000004','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000005','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000006','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000007','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000008','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000009','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000010','计算机','DELL HY3','AD101',null,null,null,null,null,null);


insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000011','投影仪','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000012','投影仪','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000013','投影仪','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000014','投影仪','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000015','投影仪','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000016','投影仪','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000017','投影仪','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000018','投影仪','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000019','投影仪','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('A14201000020','投影仪','DELL HY3','AD101',null,null,null,null,null,null);



insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('B14201000001','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('B14201000002','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('B14201000003','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('B14201000004','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('B14201000005','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('B14201000006','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('B14201000007','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('B14201000008','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('B14201000009','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('B14201000010','计算机','DELL HY3','AD101',null,null,null,null,null,null);


insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('C14201700001','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('C14201700002','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('C14201700003','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('C14201700004','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('C14201700005','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('C14201700006','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('C14201700007','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('C14201700008','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('C14201700009','计算机','DELL HY3','AD101',null,null,null,null,null,null);
insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status) VALUES ('C14201700010','计算机','DELL HY3','AD101',null,null,null,null,null,null);


=============================================================================================================================================================

实验室预约表equipreserve_tb


equipreserve_id	varchar(32);	设备预约编号	主键，unix_timestamp(now())
equipreserve_perName varchar(32);	设备预约人姓名	
equipreserve_perId varchar(32);	设备预约人学号/工号	
equipreserve_perPhone varchar(32);	设备预约人手机	
equipreserve_perMail varchar(64);	设备预约人邮箱		
equipreserve_date date;	预约日期	
equipreserve_time varchar(64);	预约时间段	
equipreserve_reason varchar(255);	设备预约原因	
equipreserve_status	int(1);	预约审核状态	1代表已提交审核2代表审核通过3代表预约被拒
equipreserve_report	varchar(255);	预约反馈报告	

create table equipreserve_tb(
equipreserve_id varchar(32) NOT NULL,
equipreserve_perName varchar(32) DEFAULT NULL,
equipreserve_perId varchar(32) NOT NULL,
equipreserve_perPhone varchar(32) DEFAULT NULL,
equipreserve_perMail varchar(64) DEFAULT NULL,
equipreserve_equip varchar(64) NOT NULL,
equipreserve_date date DEFAULT NULL,
equipreserve_time varchar(64) DEFAULT NULL,
equipreserve_reason varchar(255) DEFAULT NULL,
equipreserve_status int(1) NOT NULL DEFAULT '1',
equipreserve_report varchar(255) DEFAULT NULL,
PRIMARY KEY(equipreserve_id)
);




================================================================================================================================================================
设备类型表equiptype_tb

equiptype_id 设备类型编号
equiptype_name 设备名称

create table equiptype_tb(
equiptype_id int(6) NOT NUll auto_increment,
equiptype_name varchar(32) NOT NULL,
PRIMARY KEY(equiptype_id)
);




=================================================================================================================================================================
竞赛类型表comptype_tb

comptype_id 竞赛类型编号
comptype_name 竞赛类型名称



create table comptype_tb(
comptype_id int(6) NOT NUll auto_increment,
comptype_name varchar(32) NOT NULL,
PRIMARY KEY(comptype_id)
);











=============================================================================================================================================================



竞赛信息表comp_tb

comp_id 竞赛编号(获取时间自动生成)
comp_name 竞赛名称
comp_type 竞赛类型(1综合性2信息安全类)
comp_sponsor 竞赛主办方
comp_numper 每组人数
comp_info 竞赛信息
comp_depart 竞赛报名截止
comp_start 竞赛开始时间
comp_end 竞赛截止时间
comp_file 竞赛附件
comp_status 竞赛状态(1报名中2竞赛中3已结束)

create table comp_tb(
comp_id varchar(32) NOT NULL,
comp_name varchar(64) NOT NULL,
comp_type varchar(32) DEFAULT NULL,
comp_sponsor varchar(255) DEFAULT NULL,
comp_numper varchar(32) DEFAULT NULL,
comp_info varchar(255) DEFAULT NULL,
comp_depart datetime DEFAULT NULL,
comp_start datetime DEFAULT NULL,
comp_end datetime DEFAULT NULL,
comp_file varchar(255) DEFAULT NULL,
comp_status int(1) NOT NULL DEFAULT '1',
PRIMARY KEY(comp_id)
);

insert into comp_tb (comp_id,comp_name,comp_type) VALUES (unix_timestamp(now()),'挑战杯','综合类');

insert into comp_tb (comp_id,comp_name,comp_type,comp_sponsor,comp_numper,comp_info,comp_depart,comp_start,comp_end,comp_file,comp_status) VALUES (unix_timestamp(now()),'挑战杯','综合类',null,null,null,null,null,null,null,'3');
insert into comp_tb (comp_id,comp_name,comp_type,comp_sponsor,comp_numper,comp_info,comp_depart,comp_start,comp_end,comp_file,comp_status) VALUES (unix_timestamp(now()),'网络安全挑战赛','信息安全类',null,null,null,null,null,null,null,'3');
insert into comp_tb (comp_id,comp_name,comp_type,comp_sponsor,comp_numper,comp_info,comp_depart,comp_start,comp_end,comp_file,comp_status) VALUES (unix_timestamp(now()),'挑战杯','综合类',null,null,null,null,null,null,null,'3');
insert into comp_tb (comp_id,comp_name,comp_type,comp_sponsor,comp_numper,comp_info,comp_depart,comp_start,comp_end,comp_file,comp_status) VALUES (unix_timestamp(now()),'挑战杯','综合类',null,null,null,null,null,null,null,'2');
insert into comp_tb (comp_id,comp_name,comp_type,comp_sponsor,comp_numper,comp_info,comp_depart,comp_start,comp_end,comp_file,comp_status) VALUES (unix_timestamp(now()),'大数据挑战赛','综合类',null,null,null,null,null,null,null,'2');
insert into comp_tb (comp_id,comp_name,comp_type,comp_sponsor,comp_numper,comp_info,comp_depart,comp_start,comp_end,comp_file,comp_status) VALUES (unix_timestamp(now()),'挑战杯','综合类',null,null,null,null,null,null,null,'1');
insert into comp_tb (comp_id,comp_name,comp_type,comp_sponsor,comp_numper,comp_info,comp_depart,comp_start,comp_end,comp_file,comp_status) VALUES (unix_timestamp(now()),'天工杯','综合类',null,null,null,null,null,null,null,'1');



=======================================================================================================================================================================


竞赛报名表compjoin_tb

compjoin_id 参赛编号(获取时间生成)
comp_id 竞赛编号(报名时导入)
compjoin_name 团队名称
compjoin_leaderName 团队队长
compjoin_leaderId 队长学号 
compjoin_leaderPhone 队长手机号码
compjoin_leaderMail 队长手机邮箱
compjoin_memberName_1 队员姓名
compjoin_memberId_1 队员学号
compjoin_memberName_2 队员姓名
compjoin_memberId_2 队员学号
compjoin_memberName_3 队员姓名
compjoin_memberId_3 队员学号
compjoin_memberName_4 队员姓名
compjoin_memberId_4 队员学号
compjoin_teaName 指导老师姓名
compjoin_teaId 指导老师工号
compjoin_teaPhone 指导老师手机
compjoin_teaMail 指导老师邮箱
compjoin_glory 参赛荣誉
compjoin_status 报名状态(1审核中2报名成功3已拒绝)

create table compjoin_tb(
compjoin_id varchar(32) NOT NULL,
comp_id varchar(32) NOT NULL,
compjoin_name varchar(64) DEFAULT NULL, 
compjoin_leaderName varchar(32) NOT NULL,
compjoin_leaderId varchar(32) NOT NULL,
compjoin_leaderPhone varchar(32) NOT NULL,
compjoin_leaderMail varchar(32) NOT NULL,
compjoin_memberName_1 varchar(32) DEFAULT NULL,
compjoin_memberId_1 varchar(32) DEFAULT NULL,
compjoin_memberName_2 varchar(32) DEFAULT NULL,
compjoin_memberId_2 varchar(32) DEFAULT NULL,
compjoin_memberName_3 varchar(32) DEFAULT NULL,
compjoin_memberId_3 varchar(32) DEFAULT NULL,
compjoin_memberName_4 varchar(32) DEFAULT NULL,
compjoin_memberId_4 varchar(32) DEFAULT NULL,
compjoin_teaName varchar(32) DEFAULT NULL,
compjoin_teaId varchar(32) DEFAULT NULL,
compjoin_teaPhone varchar(32) DEFAULT NULL,
compjoin_teaMail varchar(32) DEFAULT NULL,
compjoin_glory varchar(32) DEFAULT NULL,
compjoin_status varchar(32) DEFAULT '审核中',
PRIMARY KEY(compjoin_id)
);

insert into compjoin_tb (comp_id,compjoin_id,compjoin_name,compjoin_leaderName,compjoin_leaderId,compjoin_leaderPhone,compjoin_leaderMail) VALUES ('20150509102223','20150510031235','队名','队长名','2013014123','13212345678','132@buct.edu.com');
insert into compjoin_tb (comp_id,compjoin_id,compjoin_name,compjoin_leaderName,compjoin_leaderId,compjoin_leaderPhone,compjoin_leaderMail) VALUES ('20150509102223','20150510045456','队名名','队长名名','2013014452','13212342358','4654@buct.edu.com');
insert into compjoin_tb (comp_id,compjoin_id,compjoin_name,compjoin_leaderName,compjoin_leaderId,compjoin_leaderPhone,compjoin_leaderMail) VALUES ('20150509102223','20150510091233','队名','队长名字','2013014145','13212345789','8987@buct.edu.com');


insert into compjoin_tb (comp_id,compjoin_id,compjoin_name,compjoin_leaderName,compjoin_leaderId,compjoin_leaderPhone,compjoin_leaderMail) VALUES ('20171011102223','20170510031235','队名','队长名','2014014123','13212345678','132@buct.edu.com');
insert into compjoin_tb (comp_id,compjoin_id,compjoin_name,compjoin_leaderName,compjoin_leaderId,compjoin_leaderPhone,compjoin_leaderMail) VALUES ('20171011102223','20170510045456','队名名','队长名名','2014014452','13212342358','4654@buct.edu.com');
insert into compjoin_tb (comp_id,compjoin_id,compjoin_name,compjoin_leaderName,compjoin_leaderId,compjoin_leaderPhone,compjoin_leaderMail) VALUES ('20171011102223','20170510091233','队名','队长名字','2014014145','13212345789','8987@buct.edu.com');


=======================================================================================================================================================================


反馈信息表feedbcak_tb

feedback_id 反馈信息编号
feedback_time 反馈日期
feedback_name 反馈者姓名
feedback_perid 反馈者学号/工号
feedback_phone 反馈者手机
feedback_mail 反馈者邮箱
feedback_content 反馈内容

create table feedback_tb(
feedback_id int(10) NOT NULL auto_increment,
feedback_time date DEFAULT NULL,
feedback_name varchar(32) NOT NULL,
feedback_perid varchar(32) NOT NULL,
feedback_phone varchar(32) NOT NULL,
feedback_mail varchar(32) NOT NULL,
feedback_content varchar(255) NOT NULL,
PRIMARY KEY(feedback_id)
);

insert into feedback_tb (feedback_time,feedback_name,feedback_perid,feedback_phone,feedback_mail,feedback_content) VALUES (curdate(),'反馈者姓名','2013014153','15201620457','714965405@qq.com','这是反馈内容');



=======================================================================================================================================================================


通知公共告表notice_tb

notice_id 公告编号
notice_title 公告标题
notice_content 公告内容
notice_time 公告时间


create table notice_tb(
notice_id int(10) NOT NULL auto_increment,
notice_title varchar(32) NOT NULL,
notice_content varchar(255) NOT NULL,
notice_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(notice_id)
);

insert into notice_tb (notice_title,notice_content) VALUES ('测试','测试内容');












