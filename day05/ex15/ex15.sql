SELECT  REVERSE(SUBSTRING(telephone, 2, CHAR_LENGTH(telephone) - 1)) as enohpelet  FROM `distrib` WHERE telephone like '05%'