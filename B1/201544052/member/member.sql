  create table member (
  id    varchar(15)  not null,
  pass  varchar(15)  not null,
  name  varchar(10)  not null,
  birth varchar(6)   not null,
  hvy   varchar(100) not null,
  hp    varchar(20)  not null,
  email varchar(80),
  regist_day char(20),
  level int,
  primary key(id)
  );