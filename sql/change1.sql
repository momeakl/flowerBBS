USE bbs;
DELETE FROM forum_topic
WHERE VIEW = 0;

ALTER TABLE forum_topic
DROP COLUMN locked;

DELETE FROM forum_user
WHERE id = 1;

