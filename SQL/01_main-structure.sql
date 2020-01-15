drop table if exists public.user;
create table if not exists public.user
(
    id         serial primary key not null,
    name       varchar(150) default null,
    username   varchar(20)        not null,
    email      varchar(60)        not null,
    usergroup  varchar(15)  default 'Registered',
    enabled    int4         default 1,
    activated  int4         default 1,
    lastvisit  timestamp,
    created_at timestamp    default now(),
    updated_at timestamp    default null
);
