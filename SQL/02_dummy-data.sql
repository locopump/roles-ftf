insert into public.user(id, name, username, email, usergroup, enabled, activated, lastvisit)
values
       (1, 'Luke Skywalker', 'luke', 'luke@luke.com', 'Registered', 1, 1, '2017-08-31'),
       (2, 'Han Solo', 'han', 'han@han.com', 'Registered', 0, 0, '2017-08-31'),
       (3, 'Princess Leia Organa', 'leia', 'leia@leia.com', 'Registered', 1, 1, '2017-08-31'),
       (4, 'Obi-Wan Kenobi', 'ben', 'ben@wankenobi.com', 'Registered', 0, 0, '2017-08-31'),
       (5, 'R2-D2', 'r2d2', 'r2d2@r2d2.com', 'Registered', 1, 1, '2017-08-31')
;
select setval('public.user_id_seq', 5, true);