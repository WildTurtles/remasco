CREATE TABLE answers (
  id       uuid NOT NULL, 
  name     varchar(50), 
  is_right int4, 
  created  timestamp, 
  updated  timestamp, 
  PRIMARY KEY (id));
CREATE TABLE answers_questions (
  answer_id   uuid NOT NULL, 
  question_id uuid NOT NULL, 
  position    int4, 
  created     timestamp, 
  updated     timestamp, 
  PRIMARY KEY (answer_id, 
  question_id));
CREATE TABLE answers_questions_tries (
  questions_try_id            uuid NOT NULL, 
  questions_tries_question_id uuid NOT NULL, 
  answer_id                   uuid NOT NULL, 
  PRIMARY KEY (questions_try_id, 
  questions_tries_question_id, 
  answer_id));
CREATE TABLE appreciations (
  id      uuid NOT NULL, 
  created timestamp, 
  updated timestamp, 
  name    varchar(25), 
  PRIMARY KEY (id));
CREATE TABLE appreciations_opened_answers (
  appreciationsid  uuid NOT NULL, 
  opened_answersid uuid NOT NULL, 
  created          timestamp, 
  updated          timestamp, 
  name             varchar(25), 
  PRIMARY KEY (appreciationsid, 
  opened_answersid));
CREATE TABLE chapters (
  id      uuid NOT NULL, 
  name    int4, 
  created timestamp, 
  updated timestamp, 
  PRIMARY KEY (id));
CREATE TABLE chapters_paths (
  chapter_id uuid NOT NULL, 
  path_id    uuid NOT NULL, 
  created    timestamp, 
  updated    timestamp, 
  PRIMARY KEY (chapter_id, 
  path_id));
CREATE TABLE expected_answers (
  id      uuid NOT NULL, 
  name    text NOT NULL, 
  created timestamp, 
  updated timestamp, 
  PRIMARY KEY (id));
CREATE TABLE groups (
  id           uuid NOT NULL, 
  name         varchar(25) NOT NULL UNIQUE, 
  is_deletable bool DEFAULT '1', 
  PRIMARY KEY (id));
CREATE TABLE groups_topics (
  groupsid uuid NOT NULL, 
  topicsid uuid NOT NULL, 
  PRIMARY KEY (groupsid, 
  topicsid));
CREATE TABLE groups_users (
  group_id uuid NOT NULL, 
  user_id  uuid NOT NULL, 
  PRIMARY KEY (group_id, 
  user_id));
CREATE TABLE links (
  id      uuid NOT NULL, 
  name    int4, 
  url     int4, 
  created timestamp, 
  updated timestamp, 
  PRIMARY KEY (id));
CREATE TABLE links_steps (
  link_id uuid NOT NULL, 
  step_id uuid NOT NULL, 
  created timestamp, 
  updated timestamp, 
  PRIMARY KEY (link_id, 
  step_id));
CREATE TABLE multiple_choice_questions (
  id      uuid NOT NULL, 
  name    varchar(50), 
  created timestamp, 
  updated timestamp, 
  PRIMARY KEY (id));
CREATE TABLE multiple_choice_questions_questions (
  question_id                 uuid NOT NULL, 
  multiple_choice_question_id uuid NOT NULL, 
  created                     timestamp, 
  updated                     timestamp, 
  PRIMARY KEY (question_id, 
  multiple_choice_question_id));
CREATE TABLE multiple_choice_questions_steps (
  multiple_choice_question_id uuid NOT NULL, 
  step_id                     uuid NOT NULL, 
  number                      int4, 
  updated                     timestamp, 
  created                     timestamp, 
  PRIMARY KEY (multiple_choice_question_id, 
  step_id));
CREATE TABLE multiple_choice_questions_tries (
  try_id                      uuid NOT NULL, 
  multiple_choice_question_id uuid NOT NULL, 
  created                     timestamp, 
  updated                     timestamp, 
  PRIMARY KEY (try_id, 
  multiple_choice_question_id));
CREATE TABLE opened_answers (
  id                 uuid NOT NULL, 
  created            timestamp, 
  updated            timestamp, 
  triesid            uuid NOT NULL, 
  opened_questionsid uuid NOT NULL, 
  name               varchar(25), 
  corrected          bool, 
  PRIMARY KEY (id));
CREATE TABLE opened_questions (
  id                 uuid NOT NULL, 
  name               text NOT NULL, 
  notes              text, 
  created            timestamp, 
  updated            timestamp, 
  expected_answer_id uuid NOT NULL, 
  PRIMARY KEY (id));
CREATE TABLE opened_questions_steps (
  id                 uuid NOT NULL, 
  opened_question_id uuid NOT NULL, 
  step_id            uuid NOT NULL, 
  created            timestamp, 
  updated            timestamp, 
  number             int4, 
  PRIMARY KEY (id));
CREATE TABLE paths (
  id      uuid NOT NULL, 
  name    varchar(25), 
  notes   text, 
  created timestamp, 
  updated timestamp, 
  PRIMARY KEY (id));
CREATE TABLE questions (
  id      uuid NOT NULL, 
  name    text, 
  note    text, 
  created timestamp, 
  updated timestamp, 
  PRIMARY KEY (id));
CREATE TABLE questions_tries (
  try_id      uuid NOT NULL, 
  question_id uuid NOT NULL, 
  done        bool, 
  created     timestamp, 
  updated     timestamp, 
  PRIMARY KEY (try_id, 
  question_id));
CREATE TABLE steps (
  id      uuid NOT NULL, 
  number  int4, 
  path_id uuid NOT NULL, 
  lock    bool, 
  created timestamp, 
  updated timestamp, 
  PRIMARY KEY (id));
CREATE TABLE topics (
  id      uuid NOT NULL, 
  name    int4, 
  created timestamp, 
  updated timestamp, 
  usersid uuid NOT NULL, 
  PRIMARY KEY (id));
CREATE TABLE topics_chapters (
  topic_id   uuid NOT NULL, 
  chapter_id uuid NOT NULL, 
  created    timestamp, 
  updated    timestamp, 
  PRIMARY KEY (topic_id, 
  chapter_id));
CREATE TABLE tries (
  id      uuid NOT NULL, 
  created timestamp, 
  updated timestamp, 
  user_id uuid NOT NULL, 
  PRIMARY KEY (id));
CREATE TABLE tries_paths (
  try_id  uuid NOT NULL, 
  path_id uuid NOT NULL, 
  created timestamp, 
  updated timestamp, 
  PRIMARY KEY (try_id, 
  path_id));
CREATE TABLE users (
  id       uuid NOT NULL, 
  name     varchar(50), 
  fistname varchar(50), 
  avatar   varchar(250), 
  pseudo   varchar(50), 
  email    varchar(75), 
  password varchar(256), 
  PRIMARY KEY (id));
CREATE TABLE users_paths (
  usersid uuid NOT NULL, 
  pathsid uuid NOT NULL, 
  PRIMARY KEY (usersid, 
  pathsid));
CREATE UNIQUE INDEX answers_id 
  ON answers (id);
CREATE UNIQUE INDEX appreciations_id 
  ON appreciations (id);
CREATE UNIQUE INDEX chapters_id 
  ON chapters (id);
CREATE UNIQUE INDEX expected_answers_id 
  ON expected_answers (id);
CREATE UNIQUE INDEX groups_id 
  ON groups (id);
CREATE INDEX groups_users_group_id 
  ON groups_users (group_id);
CREATE INDEX groups_users_user_id 
  ON groups_users (user_id);
CREATE UNIQUE INDEX links_id 
  ON links (id);
CREATE UNIQUE INDEX multiple_choice_questions_id 
  ON multiple_choice_questions (id);
CREATE UNIQUE INDEX opened_questions_id 
  ON opened_questions (id);
CREATE UNIQUE INDEX opened_questions_steps_id 
  ON opened_questions_steps (id);
CREATE UNIQUE INDEX paths_id 
  ON paths (id);
CREATE UNIQUE INDEX questions_id 
  ON questions (id);
CREATE UNIQUE INDEX steps_id 
  ON steps (id);
CREATE INDEX steps_path_id 
  ON steps (path_id);
CREATE UNIQUE INDEX topics_id 
  ON topics (id);
CREATE UNIQUE INDEX tries_id 
  ON tries (id);
CREATE UNIQUE INDEX users_id 
  ON users (id);
CREATE INDEX users_avatar 
  ON users (avatar);
CREATE UNIQUE INDEX users_pseudo 
  ON users (pseudo);
ALTER TABLE tries ADD CONSTRAINT FKtries77910 FOREIGN KEY (user_id) REFERENCES users (id);
ALTER TABLE steps ADD CONSTRAINT FKsteps250842 FOREIGN KEY (path_id) REFERENCES paths (id);
ALTER TABLE opened_questions ADD CONSTRAINT FKopened_que235997 FOREIGN KEY (expected_answer_id) REFERENCES expected_answers (id);
ALTER TABLE opened_questions_steps ADD CONSTRAINT FKopened_que782953 FOREIGN KEY (opened_question_id) REFERENCES opened_questions (id);
ALTER TABLE opened_questions_steps ADD CONSTRAINT FKopened_que710570 FOREIGN KEY (step_id) REFERENCES steps (id);
ALTER TABLE groups_users ADD CONSTRAINT FKgroups_use122235 FOREIGN KEY (group_id) REFERENCES groups (id);
ALTER TABLE groups_users ADD CONSTRAINT FKgroups_use576859 FOREIGN KEY (user_id) REFERENCES users (id);
ALTER TABLE topics_chapters ADD CONSTRAINT FKtopics_cha377456 FOREIGN KEY (topic_id) REFERENCES topics (id);
ALTER TABLE topics_chapters ADD CONSTRAINT FKtopics_cha539641 FOREIGN KEY (chapter_id) REFERENCES chapters (id);
ALTER TABLE chapters_paths ADD CONSTRAINT FKchapters_p172651 FOREIGN KEY (chapter_id) REFERENCES chapters (id);
ALTER TABLE chapters_paths ADD CONSTRAINT FKchapters_p977619 FOREIGN KEY (path_id) REFERENCES paths (id);
ALTER TABLE tries_paths ADD CONSTRAINT FKtries_path908679 FOREIGN KEY (try_id) REFERENCES tries (id);
ALTER TABLE tries_paths ADD CONSTRAINT FKtries_path270072 FOREIGN KEY (path_id) REFERENCES paths (id);
ALTER TABLE groups_topics ADD CONSTRAINT FKgroups_top58630 FOREIGN KEY (groupsid) REFERENCES groups (id);
ALTER TABLE groups_topics ADD CONSTRAINT FKgroups_top830239 FOREIGN KEY (topicsid) REFERENCES topics (id);
ALTER TABLE users_paths ADD CONSTRAINT FKusers_path135299 FOREIGN KEY (usersid) REFERENCES users (id);
ALTER TABLE users_paths ADD CONSTRAINT FKusers_path596608 FOREIGN KEY (pathsid) REFERENCES paths (id);
ALTER TABLE links_steps ADD CONSTRAINT FKlinks_step352215 FOREIGN KEY (link_id) REFERENCES links (id);
ALTER TABLE links_steps ADD CONSTRAINT FKlinks_step750267 FOREIGN KEY (step_id) REFERENCES steps (id);
ALTER TABLE answers_questions ADD CONSTRAINT FKanswers_qu695826 FOREIGN KEY (answer_id) REFERENCES answers (id);
ALTER TABLE answers_questions ADD CONSTRAINT FKanswers_qu199268 FOREIGN KEY (question_id) REFERENCES questions (id);
ALTER TABLE multiple_choice_questions_steps ADD CONSTRAINT FKmultiple_c998669 FOREIGN KEY (multiple_choice_question_id) REFERENCES multiple_choice_questions (id);
ALTER TABLE multiple_choice_questions_steps ADD CONSTRAINT FKmultiple_c683578 FOREIGN KEY (step_id) REFERENCES steps (id);
ALTER TABLE multiple_choice_questions_tries ADD CONSTRAINT FKmultiple_c986416 FOREIGN KEY (try_id) REFERENCES tries (id);
ALTER TABLE multiple_choice_questions_tries ADD CONSTRAINT FKmultiple_c866112 FOREIGN KEY (multiple_choice_question_id) REFERENCES multiple_choice_questions (id);
ALTER TABLE multiple_choice_questions_questions ADD CONSTRAINT FKmultiple_c340580 FOREIGN KEY (question_id) REFERENCES questions (id);
ALTER TABLE multiple_choice_questions_questions ADD CONSTRAINT FKmultiple_c890594 FOREIGN KEY (multiple_choice_question_id) REFERENCES multiple_choice_questions (id);
ALTER TABLE questions_tries ADD CONSTRAINT FKquestions_875442 FOREIGN KEY (try_id) REFERENCES tries (id);
ALTER TABLE questions_tries ADD CONSTRAINT FKquestions_306396 FOREIGN KEY (question_id) REFERENCES questions (id);
ALTER TABLE answers_questions_tries ADD CONSTRAINT FKanswers_qu560201 FOREIGN KEY (questions_try_id, questions_tries_question_id) REFERENCES questions_tries (try_id, question_id);
ALTER TABLE answers_questions_tries ADD CONSTRAINT FKanswers_qu60962 FOREIGN KEY (answer_id) REFERENCES answers (id);
ALTER TABLE opened_answers ADD CONSTRAINT FKopened_ans829791 FOREIGN KEY (triesid) REFERENCES tries (id);
ALTER TABLE opened_answers ADD CONSTRAINT FKopened_ans237447 FOREIGN KEY (opened_questionsid) REFERENCES opened_questions (id);
ALTER TABLE appreciations_opened_answers ADD CONSTRAINT FKappreciati112570 FOREIGN KEY (appreciationsid) REFERENCES appreciations (id);
ALTER TABLE appreciations_opened_answers ADD CONSTRAINT FKappreciati629357 FOREIGN KEY (opened_answersid) REFERENCES opened_answers (id);

