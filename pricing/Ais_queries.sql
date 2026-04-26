For service_attribute_values 


CREATE TABLE service_attribute_values(
    valuerefid bigint AUTO_INCREMENT,
    valueServiceId bigint,
    sku_code varchar(64),
    attCode varchar(64),
    attributeValue varchar(256),
    createddate timestamp DEFAULT CURRENT_TIMESTAMP,
    modifieddate timestamp DEFAULT CURRENT_TIMESTAMP,
    field1 varchar(32),
    field2 varchar(64),
    field3 varchar(128),
    PRIMARY KEY(valuerefid)
   )


Input values 

For AIS_silver

INSERT INTO `service_attribute_values`(`valueServiceId`, `sku_code`, `attCode`, `attributeValue`) VALUES (8,'AIS_silver','att1',true)

INSERT INTO `service_attribute_values`(`valueServiceId`, `sku_code`, `attCode`, `attributeValue`) VALUES (8,'AIS_silver','att2',false)

INSERT INTO `service_attribute_values`(`valueServiceId`, `sku_code`, `attCode`, `attributeValue`) VALUES (8,'AIS_silver','att3',false)


For AIS_gold


INSERT INTO `service_attribute_values`(`valueServiceId`, `sku_code`, `attCode`, `attributeValue`) VALUES (8,'AIS_gold','att1',true)

INSERT INTO `service_attribute_values`(`valueServiceId`, `sku_code`, `attCode`, `attributeValue`) VALUES (8,'AIS_gold','att2',true)

INSERT INTO `service_attribute_values`(`valueServiceId`, `sku_code`, `attCode`, `attributeValue`) VALUES (8,'AIS_gold','att3',false)


For AIS_platinum

INSERT INTO `service_attribute_values`(`valueServiceId`, `sku_code`, `attCode`, `attributeValue`) VALUES (8,'AIS_platinum','att1',true)

INSERT INTO `service_attribute_values`(`valueServiceId`, `sku_code`, `attCode`, `attributeValue`) VALUES (8,'AIS_AIS_platinum','att2',true)

INSERT INTO `service_attribute_values`(`valueServiceId`, `sku_code`, `attCode`, `attributeValue`) VALUES (8,'AIS_AIS_platinum','att3',true)




For service_attribute_master


CREATE TABLE service_attribute_master(
    attrefid bigint AUTO_INCREMENT,
    serviceId int(11),
    attCode varchar(32),
    attributeName varchar(256),
    attributeType varchar(32),
    position int(4),
    isvisible boolean,
    createddate timestamp DEFAULT CURRENT_TIMESTAMP,
    modifieddate timestamp DEFAULT CURRENT_TIMESTAMP,
    isactive boolean,
    field1 varchar(32),
    field2 varchar(64),
    field3 varchar(128),
    PRIMARY KEY(attrefid),
    KEY FK_attserviceId (serviceId),
    CONSTRAINT FK_attserviceId FOREIGN KEY (serviceId) REFERENCES service_master(servicerefid)
)




Input values


INSERT INTO `service_attribute_master`(`serviceId`, `attCode`, `attributeName`, `attributeType`, `position`, `isvisible`,`isactive`) VALUES (1,’att1’,'Questions 1 - 50','checkbox',1,1,1)

INSERT INTO `service_attribute_master`(`serviceId`, `attCode`, `attributeName`, `attributeType`, `position`, `isvisible`,`isactive`) VALUES (1,'att2','Questions 1 - 150','checkbox',2,1,1)




