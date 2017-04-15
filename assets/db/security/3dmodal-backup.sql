#
 # TABLE STRUCTURE FOR: administrators
 #
 
 DROP TABLE IF EXISTS `administrators`;
 
 CREATE TABLE `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isSuper` int(1) NOT NULL DEFAULT '0',
  `createdTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `isBuildIn` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=gbk;
 
 INSERT INTO `administrators` (`id`, `userName`, `password`, `isSuper`, `createdTime`, `isBuildIn`) VALUES ('1', 'admin', '325a2cc052914ceeb8c19016c091d2ac', '1', '2017-02-18 02:02:34', '1');
 INSERT INTO `administrators` (`id`, `userName`, `password`, `isSuper`, `createdTime`, `isBuildIn`) VALUES ('2', 'asdsadsdsa', 'b59c67bf196a4758191e42f76670ceba', '0', '2017-02-18 02:02:55', '0');
 INSERT INTO `administrators` (`id`, `userName`, `password`, `isSuper`, `createdTime`, `isBuildIn`) VALUES ('3', 'sadsasadsad', 'b59c67bf196a4758191e42f76670ceba', '0', '2017-02-18 02:02:15', '0');
 INSERT INTO `administrators` (`id`, `userName`, `password`, `isSuper`, `createdTime`, `isBuildIn`) VALUES ('4', 'lalattttt', 'b59c67bf196a4758191e42f76670ceba', '0', '2017-02-18 02:02:22', '0');
 INSERT INTO `administrators` (`id`, `userName`, `password`, `isSuper`, `createdTime`, `isBuildIn`) VALUES ('5', '12', 'b59c67bf196a4758191e42f76670ceba', '1', '2017-02-18 03:02:28', '0');
 INSERT INTO `administrators` (`id`, `userName`, `password`, `isSuper`, `createdTime`, `isBuildIn`) VALUES ('6', 'lala12', 'b59c67bf196a4758191e42f76670ceba', '0', '2017-02-18 03:02:00', '0');
 INSERT INTO `administrators` (`id`, `userName`, `password`, `isSuper`, `createdTime`, `isBuildIn`) VALUES ('7', 'lala', 'b59c67bf196a4758191e42f76670ceba', '0', '2017-02-18 03:02:49', '0');
 INSERT INTO `administrators` (`id`, `userName`, `password`, `isSuper`, `createdTime`, `isBuildIn`) VALUES ('8', 'lala222', 'b59c67bf196a4758191e42f76670ceba', '0', '2017-02-18 03:02:09', '0');
 INSERT INTO `administrators` (`id`, `userName`, `password`, `isSuper`, `createdTime`, `isBuildIn`) VALUES ('9', 'superAdmin', '325a2cc052914ceeb8c19016c091d2ac', '1', '2017-02-25 03:02:24', '0');
 INSERT INTO `administrators` (`id`, `userName`, `password`, `isSuper`, `createdTime`, `isBuildIn`) VALUES ('10', 'normalAdmin', '325a2cc052914ceeb8c19016c091d2ac', '0', '2017-02-25 03:02:34', '0');
 
 
 #
 # TABLE STRUCTURE FOR: modal_meterials
 #
 
 DROP TABLE IF EXISTS `modal_meterials`;
 
 CREATE TABLE `modal_meterials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modal_id` varchar(50) NOT NULL,
  `meterial_Id` int(11) NOT NULL,
  `createdTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;
 
 INSERT INTO `modal_meterials` (`id`, `modal_id`, `meterial_Id`, `createdTime`) VALUES ('1', '58aaed799c7d7', '1', '2017-02-20 02:02:01');
 INSERT INTO `modal_meterials` (`id`, `modal_id`, `meterial_Id`, `createdTime`) VALUES ('4', '58ac47a979f02', '2', '2017-02-21 03:02:50');
 INSERT INTO `modal_meterials` (`id`, `modal_id`, `meterial_Id`, `createdTime`) VALUES ('5', '58ac47a979f02', '1', '2017-02-21 03:02:50');
 INSERT INTO `modal_meterials` (`id`, `modal_id`, `meterial_Id`, `createdTime`) VALUES ('7', '58ada30ba9b54', '2', '2017-02-24 01:02:58');
 
 
 #
 # TABLE STRUCTURE FOR: modalbases
 #
 
 DROP TABLE IF EXISTS `modalbases`;
 
 CREATE TABLE `modalbases` (
  `id` varchar(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `keyword` varchar(500) DEFAULT NULL,
  `isPublished` int(1) NOT NULL DEFAULT '0',
  `operatorUserName` varchar(50) NOT NULL,
  `operatorName` varchar(50) NOT NULL,
  `lastUpdatedTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `publishedDateFrom` datetime DEFAULT NULL,
  `publishedDateTo` datetime DEFAULT NULL,
  `isDeleted` int(1) NOT NULL DEFAULT '0',
  `deletedTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;
 
 INSERT INTO `modalbases` (`id`, `name`, `keyword`, `isPublished`, `operatorUserName`, `operatorName`, `lastUpdatedTime`, `createdTime`, `publishedDateFrom`, `publishedDateTo`, `isDeleted`, `deletedTime`) VALUES ('58aad804bad95', 'sadsasa', 'dsadsadsadsad', '1', 'xxx', 'xxx', '2017-02-20 12:02:28', '2017-02-20 12:02:28', '2017-01-31 00:00:00', '2017-02-25 00:00:00', '0', '2017-02-20 20:08:59');
 INSERT INTO `modalbases` (`id`, `name`, `keyword`, `isPublished`, `operatorUserName`, `operatorName`, `lastUpdatedTime`, `createdTime`, `publishedDateFrom`, `publishedDateTo`, `isDeleted`, `deletedTime`) VALUES ('58aaed799c7d7', 'asdsdsa', 'asdsadsa', '1', 'xxx', 'xxx', '2017-02-20 02:02:01', '2017-02-20 02:02:01', '2017-01-31 00:00:00', '2017-03-03 00:00:00', '0', '2017-02-20 21:22:01');
 INSERT INTO `modalbases` (`id`, `name`, `keyword`, `isPublished`, `operatorUserName`, `operatorName`, `lastUpdatedTime`, `createdTime`, `publishedDateFrom`, `publishedDateTo`, `isDeleted`, `deletedTime`) VALUES ('58aaee3e3564c', 'asdsadas', 'asdsadsa', '1', 'xxx', 'xxx', '2017-02-23 12:02:51', '2017-02-20 02:02:18', '2017-02-01 00:00:00', '2017-03-10 00:00:00', '0', '2017-02-20 21:25:18');
 INSERT INTO `modalbases` (`id`, `name`, `keyword`, `isPublished`, `operatorUserName`, `operatorName`, `lastUpdatedTime`, `createdTime`, `publishedDateFrom`, `publishedDateTo`, `isDeleted`, `deletedTime`) VALUES ('58ac47a979f02', 'erewrwrew', 'wrewrwerer', '1', 'xxx', 'xxx', '2017-02-21 03:02:50', '2017-02-21 02:02:05', NULL, NULL, '0', '2017-02-21 21:59:05');
 INSERT INTO `modalbases` (`id`, `name`, `keyword`, `isPublished`, `operatorUserName`, `operatorName`, `lastUpdatedTime`, `createdTime`, `publishedDateFrom`, `publishedDateTo`, `isDeleted`, `deletedTime`) VALUES ('58ada30ba9b54', 'tyuytu', 'yy', '1', 'xxx', 'xxx', '2017-02-24 01:02:58', '2017-02-22 03:02:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '2017-02-22 22:41:15');
 
 
 #
 # TABLE STRUCTURE FOR: modalbases_tags
 #
 
 DROP TABLE IF EXISTS `modalbases_tags`;
 
 CREATE TABLE `modalbases_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modal_id` varchar(50) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `createdTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=gbk;
 
 INSERT INTO `modalbases_tags` (`id`, `modal_id`, `tag_id`, `createdTime`) VALUES ('1', '58aad804bad95', '2', '2017-02-20 12:02:28');
 INSERT INTO `modalbases_tags` (`id`, `modal_id`, `tag_id`, `createdTime`) VALUES ('2', '58aad804bad95', '1', '2017-02-20 12:02:28');
 INSERT INTO `modalbases_tags` (`id`, `modal_id`, `tag_id`, `createdTime`) VALUES ('3', '58aad804bad95', '4', '2017-02-20 12:02:28');
 INSERT INTO `modalbases_tags` (`id`, `modal_id`, `tag_id`, `createdTime`) VALUES ('4', '58aaed799c7d7', '2', '2017-02-20 02:02:01');
 INSERT INTO `modalbases_tags` (`id`, `modal_id`, `tag_id`, `createdTime`) VALUES ('8', '58ac47a979f02', '2', '2017-02-21 03:02:50');
 INSERT INTO `modalbases_tags` (`id`, `modal_id`, `tag_id`, `createdTime`) VALUES ('9', '58ac47a979f02', '1', '2017-02-21 03:02:50');
 INSERT INTO `modalbases_tags` (`id`, `modal_id`, `tag_id`, `createdTime`) VALUES ('10', '58ac47a979f02', '3', '2017-02-21 03:02:50');
 INSERT INTO `modalbases_tags` (`id`, `modal_id`, `tag_id`, `createdTime`) VALUES ('17', '58ada30ba9b54', '2', '2017-02-24 01:02:58');
 
 
 #
 # TABLE STRUCTURE FOR: modalcategories
 #
 
 DROP TABLE IF EXISTS `modalcategories`;
 
 CREATE TABLE `modalcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `createdTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;
 
 INSERT INTO `modalcategories` (`id`, `name`, `description`, `createdTime`) VALUES ('1', 'asdsadasdsadsad', 'sdsadsa', '2017-02-18 04:02:44');
 INSERT INTO `modalcategories` (`id`, `name`, `description`, `createdTime`) VALUES ('2', 'sdfdsfdf', 'fdsfdsfds', '2017-02-19 01:02:45');
 INSERT INTO `modalcategories` (`id`, `name`, `description`, `createdTime`) VALUES ('3', '3', '3', '2017-02-19 01:02:49');
 INSERT INTO `modalcategories` (`id`, `name`, `description`, `createdTime`) VALUES ('4', 'sadsa', 'dsadsadsa', '2017-02-19 03:02:02');
 
 
 #
 # TABLE STRUCTURE FOR: modalmaterialcategories
 #
 
 DROP TABLE IF EXISTS `modalmaterialcategories`;
 
 CREATE TABLE `modalmaterialcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `createdTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;
 
 INSERT INTO `modalmaterialcategories` (`id`, `name`, `description`, `createdTime`) VALUES ('1', 'yuytuy', 'tyu', '2017-02-19 03:02:17');
 INSERT INTO `modalmaterialcategories` (`id`, `name`, `description`, `createdTime`) VALUES ('2', '光合材料', '材质很好, 防辐射', '2017-02-19 06:02:03');
 
 
 #
 # TABLE STRUCTURE FOR: modalmedias
 #
 
 DROP TABLE IF EXISTS `modalmedias`;
 
 CREATE TABLE `modalmedias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isSelected` int(1) NOT NULL DEFAULT '1',
  `path` varchar(500) NOT NULL,
  `relativePath2` varchar(500) DEFAULT NULL,
  `relativePath3` varchar(500) DEFAULT NULL,
  `modal_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=gbk;
 
 INSERT INTO `modalmedias` (`id`, `isSelected`, `path`, `relativePath2`, `relativePath3`, `modal_id`) VALUES ('17', '1', 'http://localhost/3dmodal/assets/uploads/images/0a025589-4bf0-40a8-aa89-d57413463a88.jpg', 'http://localhost/3dmodal/assets/uploads/images/thumb_0a025589-4bf0-40a8-aa89-d57413463a88.jpg', 'http://localhost/3dmodal/assets/uploads/images/small_0a025589-4bf0-40a8-aa89-d57413463a88.jpg', '58ac47a979f02');
 INSERT INTO `modalmedias` (`id`, `isSelected`, `path`, `relativePath2`, `relativePath3`, `modal_id`) VALUES ('18', '1', 'http://localhost/3dmodal/assets/uploads/images/049c098d-80af-4f50-8f58-350c5f8b429d.png', 'http://localhost/3dmodal/assets/uploads/images/thumb_049c098d-80af-4f50-8f58-350c5f8b429d.png', 'http://localhost/3dmodal/assets/uploads/images/small_049c098d-80af-4f50-8f58-350c5f8b429d.png', '58ac47a979f02');
 INSERT INTO `modalmedias` (`id`, `isSelected`, `path`, `relativePath2`, `relativePath3`, `modal_id`) VALUES ('19', '1', 'http://localhost/3dmodal/assets/uploads/images/a2388070-4f83-451a-abd7-8c378b5c566f.png', 'http://localhost/3dmodal/assets/uploads/images/thumb_a2388070-4f83-451a-abd7-8c378b5c566f.png', 'http://localhost/3dmodal/assets/uploads/images/small_a2388070-4f83-451a-abd7-8c378b5c566f.png', '58aaee3e3564c');
 INSERT INTO `modalmedias` (`id`, `isSelected`, `path`, `relativePath2`, `relativePath3`, `modal_id`) VALUES ('20', '1', 'http://localhost/3dmodal/assets/uploads/images/e909b5dd-4bfa-4e55-bf96-444ecd365898.png', 'http://localhost/3dmodal/assets/uploads/images/thumb_e909b5dd-4bfa-4e55-bf96-444ecd365898.png', 'http://localhost/3dmodal/assets/uploads/images/small_e909b5dd-4bfa-4e55-bf96-444ecd365898.png', '58aaee3e3564c');
 INSERT INTO `modalmedias` (`id`, `isSelected`, `path`, `relativePath2`, `relativePath3`, `modal_id`) VALUES ('21', '1', 'http://localhost/3dmodal/assets/uploads/images/caa0c0a3-866c-486c-97c7-d3e093689d50.jpg', 'http://localhost/3dmodal/assets/uploads/images/thumb_caa0c0a3-866c-486c-97c7-d3e093689d50.jpg', 'http://localhost/3dmodal/assets/uploads/images/small_caa0c0a3-866c-486c-97c7-d3e093689d50.jpg', '58aaee3e3564c');
 INSERT INTO `modalmedias` (`id`, `isSelected`, `path`, `relativePath2`, `relativePath3`, `modal_id`) VALUES ('22', '1', 'http://localhost/3dmodal/assets/uploads/images/208141d7-8d00-4e4c-a9e6-122e4a21677b.png', 'http://localhost/3dmodal/assets/uploads/images/thumb_208141d7-8d00-4e4c-a9e6-122e4a21677b.png', 'http://localhost/3dmodal/assets/uploads/images/small_208141d7-8d00-4e4c-a9e6-122e4a21677b.png', '58aaee3e3564c');
 INSERT INTO `modalmedias` (`id`, `isSelected`, `path`, `relativePath2`, `relativePath3`, `modal_id`) VALUES ('23', '1', '', '', '', '58ada30ba9b54');
 
 
 #
 # TABLE STRUCTURE FOR: modalmeterials
 #
 
 DROP TABLE IF EXISTS `modalmeterials`;
 
 CREATE TABLE `modalmeterials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `accuracy` decimal(8,2) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `technology` varchar(500) DEFAULT NULL,
  `workday` varchar(50) DEFAULT NULL,
  `special` varchar(1000) DEFAULT NULL,
  `suitableProduct` varchar(500) DEFAULT NULL,
  `unSuitableProduct` varchar(500) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(500) NOT NULL,
  `thumbImage` varchar(500) NOT NULL,
  `smallImage` varchar(500) NOT NULL,
  `meterialCategory_ID` int(11) NOT NULL,
  `createdTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;
 
 INSERT INTO `modalmeterials` (`id`, `name`, `color`, `price`, `accuracy`, `size`, `technology`, `workday`, `special`, `suitableProduct`, `unSuitableProduct`, `description`, `image`, `thumbImage`, `smallImage`, `meterialCategory_ID`, `createdTime`) VALUES ('1', 'asdsadsadsa22', '#30292a', '33.00', '23.00', 'dsad33', 'sadsad33', 'sad333', 'sadsa33', 'cxzzx33', 'czxczx33', 'czxczxczx333', 'http://localhost/3dmodal/assets/uploads/14f073d8-2c69-4705-8bb8-3a2124f83c55.jpg', 'http://localhost/3dmodal/assets/uploads/thumb_14f073d8-2c69-4705-8bb8-3a2124f83c55.jpg', 'http://localhost/3dmodal/assets/uploads/small_14f073d8-2c69-4705-8bb8-3a2124f83c55.jpg', '1', '2017-02-19 04:02:40');
 INSERT INTO `modalmeterials` (`id`, `name`, `color`, `price`, `accuracy`, `size`, `technology`, `workday`, `special`, `suitableProduct`, `unSuitableProduct`, `description`, `image`, `thumbImage`, `smallImage`, `meterialCategory_ID`, `createdTime`) VALUES ('2', 'aadsads', '#f2223b', '21321.00', '111.00', '22', '123', '213213', '231232', 'fdsf', 'sdfdsf', 'sdfds', 'http://localhost/3dmodal/assets/uploads/b65f9c69-25fe-4ac7-bcb4-c11b53dbe094.jpg', 'http://localhost/3dmodal/assets/uploads/thumb_b65f9c69-25fe-4ac7-bcb4-c11b53dbe094.jpg', 'http://localhost/3dmodal/assets/uploads/small_b65f9c69-25fe-4ac7-bcb4-c11b53dbe094.jpg', '2', '2017-02-19 06:02:20');
 
 
 #
 # TABLE STRUCTURE FOR: modalnews
 #
 
 DROP TABLE IF EXISTS `modalnews`;
 
 CREATE TABLE `modalnews` (
  `id` varchar(50) NOT NULL,
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;
 
 INSERT INTO `modalnews` (`id`, `content`) VALUES ('58aad804bad95', '<p>sdsadsadsdsadsasadsadsa</p>\r\n');
 
 
 #
 # TABLE STRUCTURE FOR: modals
 #
 
 DROP TABLE IF EXISTS `modals`;
 
 CREATE TABLE `modals` (
  `id` varchar(50) NOT NULL,
  `attachment` varchar(500) DEFAULT NULL,
  `attachmentSize` varchar(10) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `isDownloadable` int(1) NOT NULL DEFAULT '1',
  `image` varchar(500) NOT NULL,
  `thumbImage` varchar(500) NOT NULL,
  `smallImage` varchar(500) NOT NULL,
  `description` text,
  `shownType` varchar(10) DEFAULT NULL,
  `shownVedio` varchar(500) DEFAULT NULL,
  `shownDescription` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;
 
 INSERT INTO `modals` (`id`, `attachment`, `attachmentSize`, `category_id`, `isDownloadable`, `image`, `thumbImage`, `smallImage`, `description`, `shownType`, `shownVedio`, `shownDescription`) VALUES ('', '', NULL, '1', '1', 'http://localhost/3dmodal/assets/uploads/images/b65f9c69-25fe-4ac7-bcb4-c11b53dbe094.jpg', 'http://localhost/3dmodal/assets/uploads/images/thumb_b65f9c69-25fe-4ac7-bcb4-c11b53dbe094.jpg', 'http://localhost/3dmodal/assets/uploads/images/small_b65f9c69-25fe-4ac7-bcb4-c11b53dbe094.jpg', '', NULL, NULL, NULL);
 INSERT INTO `modals` (`id`, `attachment`, `attachmentSize`, `category_id`, `isDownloadable`, `image`, `thumbImage`, `smallImage`, `description`, `shownType`, `shownVedio`, `shownDescription`) VALUES ('58aaee3e3564c', 'http://localhost/3dmodal/assets/uploads/attachments/3D模型库管理子系统.docx', '878.49', '3', '1', 'http://localhost/3dmodal/assets/uploads/images/b65f9c69-25fe-4ac7-bcb4-c11b53dbe094.jpg', 'http://localhost/3dmodal/assets/uploads/images/thumb_b65f9c69-25fe-4ac7-bcb4-c11b53dbe094.jpg', 'http://localhost/3dmodal/assets/uploads/images/small_b65f9c69-25fe-4ac7-bcb4-c11b53dbe094.jpg', '<p><strong>dfgdfg</strong>dfgdfgdf</p>\r\n', 'vedio', 'http://localhost/3dmodal/assets/uploads/vedios/208141d7-8d00-4e4c-a9e6-122e4a21677b.png', '<p>htmlasdasdsadsadszdsadsadsad</p>\r\n\r\n<p>asdsadsadsa</p>\r\n\r\n<p>zxzxZxsadsadsa</p>\r\n');
 INSERT INTO `modals` (`id`, `attachment`, `attachmentSize`, `category_id`, `isDownloadable`, `image`, `thumbImage`, `smallImage`, `description`, `shownType`, `shownVedio`, `shownDescription`) VALUES ('58ac47a979f02', 'http://localhost/3dmodal/assets/uploads/attachments/208141d7-8d00-4e4c-a9e6-122e4a21677b.png', '806.2', '1', '1', 'http://localhost/3dmodal/assets/uploads/images/edc2f5a9-c365-4330-a591-eed33ac2be9e.png', 'http://localhost/3dmodal/assets/uploads/images/thumb_edc2f5a9-c365-4330-a591-eed33ac2be9e.png', 'http://localhost/3dmodal/assets/uploads/images/small_edc2f5a9-c365-4330-a591-eed33ac2be9e.png', '<p>This is my world</p>\r\n', 'vedio', 'http://localhost/3dmodal/assets/uploads/vedios/DCM.rar', '<p>asfsdsadsa</p>\r\n');
 INSERT INTO `modals` (`id`, `attachment`, `attachmentSize`, `category_id`, `isDownloadable`, `image`, `thumbImage`, `smallImage`, `description`, `shownType`, `shownVedio`, `shownDescription`) VALUES ('58ada30ba9b54', 'http://localhost/3dmodal/assets/uploads/attachments/b10bf630-9e1b-4a6b-8563-a0fc2ebc39df.jpg', '606.34', '3', '1', 'http://localhost/3dmodal/assets/uploads/images/a2388070-4f83-451a-abd7-8c378b5c566f.png', 'http://localhost/3dmodal/assets/uploads/images/thumb_a2388070-4f83-451a-abd7-8c378b5c566f.png', 'http://localhost/3dmodal/assets/uploads/images/small_a2388070-4f83-451a-abd7-8c378b5c566f.png', '<p>sss</p>\r\n', 'html', '', '');
 
 
 #
 # TABLE STRUCTURE FOR: modaltags
 #
 
 DROP TABLE IF EXISTS `modaltags`;
 
 CREATE TABLE `modaltags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `createdTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;
 
 INSERT INTO `modaltags` (`id`, `name`, `description`, `createdTime`) VALUES ('1', 'New York Giants', 'New York Giants1111', '2017-02-18 04:02:28');
 INSERT INTO `modaltags` (`id`, `name`, `description`, `createdTime`) VALUES ('2', 'Dallas Cowboys', 'Dallas Cowboys', '2017-02-18 04:02:34');
 INSERT INTO `modaltags` (`id`, `name`, `description`, `createdTime`) VALUES ('3', 'Philadelphia Eagles', 'Philadelphia Eagles', '2017-02-19 12:02:24');
 INSERT INTO `modaltags` (`id`, `name`, `description`, `createdTime`) VALUES ('4', 'Washington Redskins', 'Washington Redskins', '2017-02-19 12:02:30');
 INSERT INTO `modaltags` (`id`, `name`, `description`, `createdTime`) VALUES ('5', 'Denver Broncos', 'Denver Broncos', '2017-02-19 12:02:41');
 INSERT INTO `modaltags` (`id`, `name`, `description`, `createdTime`) VALUES ('6', 'ansas City Chiefs', 'ansas City Chiefs', '2017-02-19 12:02:47');
 
 
 #
 # TABLE STRUCTURE FOR: model_list
 #
 
 DROP TABLE IF EXISTS `model_list`;
 
 CREATE TABLE `model_list` (
  `modelId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` varchar(45) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `material` varchar(45) DEFAULT NULL,
  `intro` varchar(1500) DEFAULT NULL,
  `picList` varchar(1500) DEFAULT NULL,
  `isGetPic` int(11) NOT NULL DEFAULT '0',
  `isGetFile` int(11) NOT NULL DEFAULT '0',
  `attachment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`modelId`),
  UNIQUE KEY `modelId_UNIQUE` (`modelId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('1', '打印饼干模具', ' 5 KB ', '小工具', '尼龙 /透明树脂/PLA ', '创造奇形怪状的饼干，这个模具可以好帮手啊。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/71284.jpg\"]', '1', '1', 'Download/Zip/1.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('2', '扣合在一起的迷你灯', ' 5227 KB ', '家居', '尼龙 /透明树脂/PLA ', '为自己的书桌添加一个光源，就会收获一份微笑。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70854.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70855.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70856.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70857.jpg\"]', '1', '1', 'Download/Zip/2.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('3', '梳妆盒', ' 4591 KB ', '小工具', '尼龙 /透明树脂/PLA ', '女士们的化妆品可以整齐的摆放在梳妆盒里了，漂亮哟。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/71262.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/71263.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/71264.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/71265.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/71266.jpg\"]', '1', '1', 'Download/Zip/3.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('4', '皮尔斯微型灯', ' 4379 KB ', '家居', '尼龙 /透明树脂/PLA ', '不错吧，可爱的小台灯为每天的学习带来灯光。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70817.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70818.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70819.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70820.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70821.jpg\"]', '1', '1', 'Download/Zip/4.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('5', '电池支撑架', ' 3 KB ', '小工具', '尼龙 /透明树脂/PLA ', '对于捆绑式电池起到支撑作用。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70761.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70762.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70763.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70764.jpg\"]', '1', '1', 'Download/Zip/5.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('6', '个性水果盘', ' 3751 KB ', '小工具', '尼龙 /透明树脂/PLA ', '盛放饼干、啤酒喝蛋糕的盘子，很漂亮吧，用完就可以把果盘放在自己打印的架子上了呢，好方便呀。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/71258.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/71259.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/71260.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/71261.jpg\"]', '1', '1', 'Download/Zip/6.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('7', '大型LUXO灯', ' 11091 KB ', '家居', '尼龙 /透明树脂/PLA ', '设计的部件需要填满200毫米X200毫米的打印平台，对打印带来了不小的挑战。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70806.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70807.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70808.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70809.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70810.jpg\"]', '1', '1', 'Download/Zip/7.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('8', '电路板保护架', ' 544 KB ', '小工具', '尼龙 /透明树脂/PLA ', '解决打印机上的电路板固定问题，保护板结构简单，可靠地安装。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70756.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70757.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70758.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70759.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70760.jpg\"]', '1', '1', 'Download/Zip/8.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('9', '喉舌', ' 177 KB ', '小工具', '尼龙 /透明树脂/PLA ', '铜管乐器的配件，有了它就可以创造更美的音乐。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/71255.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/71256.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/71257.jpg\"]', '1', '1', 'Download/Zip/9.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('10', '折叠式LED台灯', ' 1974 KB ', '家居', '尼龙 /透明树脂/PLA ', '打印出来的LED台灯，非常的使用。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70790.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70791.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70792.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70793.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70794.jpg\"]', '1', '1', 'Download/Zip/10.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('11', '轮胎胶帮手', ' 14 KB ', '饰品', '尼龙 /透明树脂/PLA ', '非常实用的辅助工具，应用在粘合3毫米车轴轮毂的帮手。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70754.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70755.jpg\"]', '1', '1', 'Download/Zip/11.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('12', '中世纪的桶', ' 422 KB ', '饰品', '尼龙 /透明树脂/PLA ', '中世纪的木桶，脑间浮现出中世纪的场景。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/71245.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/71246.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/71247.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/71248.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/71249.jpg\"]', '1', '1', 'Download/Zip/12.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('13', '折叠LED台灯', ' 1974 KB ', '家居', '尼龙 /透明树脂/PLA ', '打印出来的LED台灯，非常的使用。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70774.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70775.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70776.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70777.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70778.jpg\"]', '1', '1', 'Download/Zip/13.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('14', '混沌曲线', ' 25346 KB ', '饰品', '尼龙 /透明树脂/PLA ', '一个点生出各式各样的曲线，有点起，到点终。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70750.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70751.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70752.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70753.jpg\"]', '1', '1', 'Download/Zip/14.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('15', '幸运的猪', ' 2338 KB ', '饰品', '尼龙 /透明树脂/PLA ', '皱皱巴巴的耳朵，丑陋的幸运猪', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/71242.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/71243.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/71244.jpg\"]', '1', '1', 'Download/Zip/15.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('16', '珠宝手', ' 437 KB ', '饰品', '尼龙 /透明树脂/PLA ', '这是珠宝持有人的手，珠宝衬托手的高贵。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70772.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70773.jpg\"]', '1', '1', 'Download/Zip/16.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('17', '普通垫片', ' 34 KB ', '饰品', '尼龙 /透明树脂/PLA ', '安装在三维打印机上的垫片。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70748.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70749.jpg\"]', '1', '1', 'Download/Zip/17.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('18', '累积钥匙扣', ' 236 KB ', '饰品', '尼龙 /透明树脂/PLA ', '一层一层的粘在一起，是不是非常的有魅力啊。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/71238.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/71239.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/71240.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/71241.jpg\"]', '1', '1', 'Download/Zip/18.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('19', '埃舍尔阶梯', ' 2 KB ', '饰品', '尼龙 /透明树脂/PLA ', '埃舍尔的艺术是真正超越时代，深入自我理性的现代艺术。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70771.jpg\"]', '1', '1', 'Download/Zip/19.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('20', '乐高块', ' 77 KB ', '饰品', '尼龙 /透明树脂/PLA ', '乐高积木块，拼接在一起吧。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70747.jpg\"]', '1', '1', 'Download/Zip/20.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('21', '页面守护者', ' 6 KB ', '首饰', '尼龙 /透明树脂/PLA ', '这款疯狂的产品设计，为你阅读书籍时带来了方便。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/71234.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/71235.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/71236.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/71237.jpg\"]', '1', '1', 'Download/Zip/21.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('22', '三星S4外壳', ' 278 KB ', '首饰', '尼龙 /透明树脂/PLA ', '三星S4的手机外壳，带有镂空的芝加哥黑鹰队的标志，值得收藏哟。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70770.jpg\"]', '1', '1', 'Download/Zip/22.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('23', '陡峭的山峦', ' 23793 KB ', '首饰', '尼龙 /透明树脂/PLA ', '陡峭、惊险而又美丽的山川。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70744.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70745.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70746.jpg\"]', '1', '1', 'Download/Zip/23.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('24', '叉勺', ' 5466 KB ', '首饰', '尼龙 /透明树脂/PLA ', '结合勺子、叉子和小刀的多功能餐具，节省了空间和成本。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/71227.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/71228.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/71229.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/71230.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/71231.jpg\"]', '1', '1', 'Download/Zip/24.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('25', 'Z轴垫片', ' 79 KB ', '首饰', '尼龙 /透明树脂/PLA ', '40毫米的风扇可以装载在垫片上，可以降低热端轴温度。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70766.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70767.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70768.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70769.jpg\"]', '1', '1', 'Download/Zip/25.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('26', '阀芯载体', ' 804 KB ', '首饰', '尼龙 /透明树脂/PLA ', '耗材的支撑框架，由20毫米X20毫米的T型槽拼成。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70742.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70743.jpg\"]', '1', '1', 'Download/Zip/26.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('27', '自定义原子基地', ' 1630 KB ', '首饰', '尼龙 /透明树脂/PLA ', '根据各自的喜好，选择不同的高度或类型的原子基地。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70858.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70859.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70860.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70861.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70862.jpg\"]', '1', '1', 'Download/Zip/27.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('28', '自定义的点击夹', ' 19 KB ', '首饰', '尼龙 /透明树脂/PLA ', '简单实用的点击夹，可以自定义设计哟。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70765.jpg\"]', '1', '1', 'Download/Zip/28.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('29', '列夫-胡', ' 1591 KB ', '首饰', '尼龙 /透明树脂/PLA ', '这是在博物馆扫描，并形成的stl文件，下载下来打印一个吧。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70741.jpg\"]', '1', '1', 'Download/Zip/29.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('30', '键盘托盘', ' 50 KB ', '首饰', '尼龙 /透明树脂/PLA ', '这是一个托盘，可以存储一些小部件，例如鼠标、笔记本适配器等。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70736.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70737.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70738.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70739.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70740.jpg\"]', '1', '1', 'Download/Zip/30.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('31', 'Y轴皮带涨紧轮', ' 24 KB ', '家居', '尼龙 /透明树脂/PLA ', '专门为GT2设计的Y轴皮带涨紧轮，采用M3X15螺栓固定。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70733.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70734.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70735.jpg\"]', '1', '1', 'Download/Zip/31.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('32', '假水晶', ' 32 KB ', '家居', '尼龙 /透明树脂/PLA ', '令人叹为观止的岩石水晶，可以利用打印机打印出来欣赏了。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70732.jpg\"]', '1', '1', 'Download/Zip/32.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('33', '电子器材保护板', ' 83 KB ', '家居', '尼龙 /透明树脂/PLA ', '固定和保护打印机上的各种电子器件。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70694.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70695.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70696.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70697.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70698.jpg\"]', '1', '1', 'Download/Zip/33.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('34', '水平轴支座', ' 104 KB ', '家居', '尼龙 /透明树脂/PLA ', '自动机床上的水平支撑支座。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70727.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70728.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70729.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70730.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70731.jpg\"]', '1', '1', 'Download/Zip/34.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('35', '耗材支撑圆柱环', ' 38 KB ', '家居', '尼龙 /透明树脂/PLA ', '用于支撑耗材的圆柱环，需要就自己打印吧。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70685.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70686.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70687.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70688.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70689.jpg\"]', '1', '1', 'Download/Zip/35.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('36', 'z轴止端支架', ' 38 KB ', '家居', '尼龙 /透明树脂/PLA ', '简单的末端站支架适用于3D打印机的Z轴。加紧8毫米杆。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70724.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70725.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70726.jpg\"]', '1', '1', 'Download/Zip/36.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('37', '倾斜框架', ' 264 KB ', '家居', '尼龙 /透明树脂/PLA ', '角度倾斜的框架，根据需要有不同的用处。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70681.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70682.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70683.jpg\"]', '1', '1', 'Download/Zip/37.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('38', '沙漠机器人', ' 207 KB ', '家居', '尼龙 /透明树脂/PLA ', '沙漠机器人是发明家在2010年创建的，零部件很多，文件非常的大。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70722.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70723.jpg\"]', '1', '1', 'Download/Zip/38.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('39', '缺口的手镯', ' 410 KB ', '家居', '尼龙 /透明树脂/PLA ', '通透的手镯，非常时尚啊。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70679.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70680.jpg\"]', '1', '1', 'Download/Zip/39.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('40', '基础圆柱', ' 70 KB ', '家居', '尼龙 /透明树脂/PLA ', '利用软件inventor创建的简单圆柱，大约1英寸高。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70719.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70720.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70721.jpg\"]', '1', '1', 'Download/Zip/40.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('41', '庇护尼克塔尼布二世的荷鲁斯神', ' 5196 KB ', '模型', '尼龙 /透明树脂/PLA ', '神采威严，望之生畏。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70676.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70677.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70678.jpg\"]', '1', '1', 'Download/Zip/41.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('42', '导杆板', ' 12 KB ', '模型', '尼龙 /透明树脂/PLA ', '为12毫米导杆提供支撑和导向作用的导杆座。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70718.jpg\"]', '1', '1', 'Download/Zip/42.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('43', '神图', ' 5083 KB ', '模型', '尼龙 /透明树脂/PLA ', '加勒比文化的代表作：神图。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70672.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70673.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70674.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70675.jpg\"]', '1', '1', 'Download/Zip/43.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('44', '引导板', ' 64 KB ', '模型', '尼龙 /透明树脂/PLA ', '耗材的引导板，适合2公斤的转轴。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70712.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70713.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70714.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70715.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70716.jpg\"]', '1', '1', 'Download/Zip/44.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('45', '大理石花瓶', ' 4134 KB ', '模型', '尼龙 /透明树脂/PLA ', '公元2世纪下半叶时期的罗马文物：蛇柄大理石花瓶。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70670.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70671.jpg\"]', '1', '1', 'Download/Zip/45.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('46', '镜子之谜', ' 8 KB ', '模型', '尼龙 /透明树脂/PLA ', '这是一个梦幻般的迷，充分说明拼图发明家的聪明才智。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70708.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70709.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70710.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70711.jpg\"]', '1', '1', 'Download/Zip/46.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('47', '双耳瓶', ' 1400 KB ', '模型', '尼龙 /透明树脂/PLA ', '公元前7世纪的文化遗产：双耳瓶。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70668.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70669.jpg\"]', '1', '1', 'Download/Zip/47.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('48', '抽芯铆钉套环', ' 1 KB ', '模型', '尼龙 /透明树脂/PLA ', '套在铆钉螺母里，使铆钉盒螺母连接更紧密。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70705.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70706.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70707.jpg\"]', '1', '1', 'Download/Zip/48.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('49', '高贵的座位', ' 2930 KB ', '模型', '尼龙 /透明树脂/PLA ', '在印度尼西亚出土的文物，是戈泰河地区文化。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70666.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70667.jpg\"]', '1', '1', 'Download/Zip/49.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('50', '哈利波特眼镜', ' 27 KB ', '模型', '尼龙 /透明树脂/PLA ', '打印出一副哈利波特的眼睛，可以在万圣节使用。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70660.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70661.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70662.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70663.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70664.jpg\"]', '1', '1', 'Download/Zip/50.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('51', '雷朋混搭眼镜架', ' 352 KB ', '建筑', '尼龙 /透明树脂/PLA ', '设计的太阳镜，拥有独特的轮廊，试一下吧。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70656.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70657.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70658.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70659.jpg\"]', '1', '1', 'Download/Zip/51.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('52', '吻多卡塔', ' 1474 KB ', '建筑', '尼龙 /透明树脂/PLA ', '可爱的卡塔，挥动着手臂，滚动着眼睛。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70636.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70637.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70638.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70639.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70640.jpg\"]', '1', '1', 'Download/Zip/52.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('53', '平板电脑可折叠支架', ' 22 KB ', '建筑', '尼龙 /透明树脂/PLA ', '可折叠支架便于携带，使用方便，打印简单。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70605.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70606.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70607.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70608.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70609.jpg\"]', '1', '1', 'Download/Zip/53.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('54', '霸气复古火箭', ' 1205 KB ', '建筑', '尼龙 /透明树脂/PLA ', '哇咔咔，好霸气的火箭呀，期待拥有！！', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70633.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70634.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70635.jpg\"]', '1', '1', 'Download/Zip/54.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('55', '乐高技术部分集合', ' 418 KB ', '建筑', '尼龙 /透明树脂/PLA ', '这些都是乐高玩具的兼容元件，十分实用。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70569.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70570.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70571.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70572.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70573.jpg\"]', '1', '1', 'Download/Zip/55.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('56', '9伏电池盖', ' 32 KB ', '建筑', '尼龙 /透明树脂/PLA ', '简单的塑料帽，旨在存储时保护 9 伏电池不会引起火灾。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70545.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70546.jpg\"]', '1', '1', 'Download/Zip/56.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('57', '罗马齿轮', ' 13 KB ', '建筑', '尼龙 /透明树脂/PLA ', '轮缘上有齿能连续啮合传递运动和动力的机械元件。齿轮是能互相啮合的有齿的机械零件，齿轮在传动中的应用很早就出现了，非常有用。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70629.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70630.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70631.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70632.jpg\"]', '1', '1', 'Download/Zip/57.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('58', '碳环', ' 321 KB ', '建筑', '尼龙 /透明树脂/PLA ', '一个小小的碳环饰品，挺不错的哦~~', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70565.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70566.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70567.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70568.jpg\"]', '1', '1', 'Download/Zip/58.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('59', '公路自行车', ' 1249 KB ', '建筑', '尼龙 /透明树脂/PLA ', '自行车配件，帮助您制作自己的爱车。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70539.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70540.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70541.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70542.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70543.jpg\"]', '1', '1', 'Download/Zip/59.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('60', '外星人的房子', ' 408 KB ', '建筑', '尼龙 /透明树脂/PLA ', '高端大气上档次呀，好像自己住进去呀~~', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70624.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70625.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70626.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70627.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70628.jpg\"]', '1', '1', 'Download/Zip/60.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('61', '梭壳', ' 30 KB ', '礼品', '尼龙 /透明树脂/PLA ', '用于存储的缝纫机线轴，方便实用。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70562.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70563.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70564.jpg\"]', '1', '1', 'Download/Zip/61.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('62', '摩托车活塞', ' 250 KB ', '礼品', '尼龙 /透明树脂/PLA ', '本田 CBR900RR 摩托车的活塞简化版。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70536.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70537.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70538.jpg\"]', '1', '1', 'Download/Zip/62.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('63', '曼德勃罗吊坠', ' 225 KB ', '吊坠', '尼龙 /透明树脂/PLA ', '可以做成任何你需要的大小。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70623.jpg\"]', '1', '1', 'Download/Zip/63.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('64', '蚌', ' 2913 KB ', '礼品', '尼龙 /透明树脂/PLA ', '水蚌就是河蚌。分布于亚洲、欧洲、北美和北非。大部分能在体内自然形成珍珠，肉可食。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70560.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70561.jpg\"]', '1', '1', 'Download/Zip/64.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('65', '滴管瓶架', ' 44 KB ', '礼品', '尼龙 /透明树脂/PLA ', '可以容纳小的滴管瓶，防止瓶翻。', '[\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70532.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70533.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70534.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70535.jpg\"]', '1', '1', 'Download/Zip/65.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('66', 'Arduino小赛车底盘', ' 64 KB ', '礼品', '尼龙 /透明树脂/PLA ', '小赛车底盘，方便镶嵌车轮、芯片和电机。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70621.jpg\",\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70622.jpg\"]', '1', '1', 'Download/Zip/66.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('67', '中国神龙', ' 1072 KB ', '礼品', '尼龙 /透明树脂/PLA ', '霸气的中国神龙大驾光临了，欢迎欢迎。', '[\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70557.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70558.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70559.jpg\"]', '1', '1', 'Download/Zip/67.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('68', 'iPhone除水套', ' 27 KB ', '礼品', '尼龙 /透明树脂/PLA ', 'iSwiper将帮助你清理你的iPhone的屏幕，如果你在雨中使用它，可以帮你去除水。', '[\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70529.jpg\",\"http:\\/\\/images3.3deazer.com\\/models\\/2015\\/09\\/70530.jpg\",\"http:\\/\\/images2.3deazer.com\\/models\\/2015\\/09\\/70531.jpg\"]', '1', '1', 'Download/Zip/68.zip');
 INSERT INTO `model_list` (`modelId`, `name`, `size`, `class`, `material`, `intro`, `picList`, `isGetPic`, `isGetFile`, `attachment`) VALUES ('69', '行李标签壳', ' 18 KB ', '礼品', '尼龙 /透明树脂/PLA ', '在标签上写上自己的名字，方便辨识。', '[\"http:\\/\\/images4.3deazer.com\\/models\\/2015\\/09\\/70619.jpg\",\"http:\\/\\/images1.3deazer.com\\/models\\/2015\\/09\\/70620.jpg\"]', '1', '1', 'Download/Zip/69.zip');
 
 
 #
 # TABLE STRUCTURE FOR: users
 #
 
 DROP TABLE IF EXISTS `users`;
 
 CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `auth_level` tinyint(3) unsigned NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
 INSERT INTO `users` (`user_id`, `username`, `email`, `auth_level`, `banned`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `created_at`, `modified_at`) VALUES ('2147484848', 'skunkbot', 'skunkbot@example.com', '9', '0', '$2y$11$NnGdrim3g54fFG7FcZmbHO8bCXSJgtkS046pP5BWu35OoKPZwEQgi', NULL, NULL, NULL, '2017-02-24 15:01:22', '2017-02-24 14:21:44', '2017-02-24 22:01:22');
 
 
 