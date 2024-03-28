<?php
include 'Stub.php';


//SSS_05_09_18_02
 $stub = new Stub("c50e8d062a0664ecca30c77f9df883c9d2d807d09a8a69f82b5658be7cbc9a58","kiransastry@foodlinked.com");

 $apiAddressPost="https://rms.naukri.com/v1/recruiterApi/requirements/8cUk0";
 $apiAddressGet="https://rms.naukri.com/v1/recruiterApi/XqgJl";
 $requirementData='{"requirementName":"Cafe Managera1da54c2-2561-4dd6-925a-f67ec5439b88","title":"Cafe Manager","description":"
<p>peoples management ,</p> <p>hygine management ,</p> <p>customer service management.</p>","salary":{"currency":"EUR","min":"230.00","max":"320.00","showToJobseeker":1},"experience":{"min":2,"max":3},"keywords":{"keyskills":"business management\n\nMBA qualified"},"locations":{"cityIds":["100","102"]},"createdBy":"RUkhsar Siddiqui","industry":"29","functionalArea":"4","role":"4.11","hiringFor":{"name":"RUkhsar Siddiqui","showToJobseeker":1},"visibilty":{"visibleTo":1},"sendNotificationMail":"1","vacancies":"2","ug":{"type":1,"courseIds":["11","5"],"specIds":["11.22","5.0"],"relation":0},"pg":{"type":1,"courseIds":["13"],"specIds":["13.9999"],"relation":0},"ppg":{"type":0},"contact":{"person":"RUkhsar Siddiqui","number":"7691944566","companyWebsite":"http://www.ssism.org","aboutCompany":"
Education Provider organization(Non Profit)

\r","showToJobseeker":1},"postOn":[{"platformType":12,"responseMode":{"type":3,"companyUrl":"http://internal.com"},"forward":{"emails":["rajat.dutta@naukri.com","ram.sevak@naukri.com"],"showToJobseeker":0}}]}';
//$stub->getApplication($apiAddressGet, 1);  
 $stub->addRequirement($apiAddressPost, $requirementData, 1);





/*"{ 'requirementName': 'SSS_10_09_18_01', 'title': 'pantry boy', 'description': 'Your Job Description', 'candidateProfile': 'Test Candidate profile', 'salary': { 'currency': 'USD', 'min': 80000, 'max': 80000, 'showToJobseeker':1 } , 'otherSalary': 'Other Salary Details', 'experience': { 'min':30, 'max': 30 } , 'keywords': ['java', 'Test'], 
 
 'locations': { 'cityIds': ['258', '258'], 'otherCity': ['Other City Name', 'Other City Name'], 'countryIds': [ { 'id': '180', 'city': 'OtherCountry'} , { 'id': '180' } ], 'otherCountry': ['Test'] }, 

 'createdBy': 'arpit.jain', 'industry': 8, 'functionalArea': 1, 'role': '1.1', 'hiringFor': { 'name': 'Test Employer', 'showToJobseeker': 0 } , 'visibilty': { 'visibleTo': 3, 'userNames': ['arpit.jain'] } ,'sendNotificationMail': 1, 'vacancies': 2, 'referenceCode': '123', 'ug': { 'type': 1, 'courseIds': ['2'], 'specIds': ['2.0'], 'relation': 0 } , 'pg': { 'type': 1, 'courseIds': ['2'], 'specIds': ['2.0'], 'relation': 1 } , 'ppg': { 'type': 1, 'courseIds': ['2'],'specIds': ['2.1'] } , 'questionnaireName': 'asdf', 'contact': { 'person': 'Contact Person', 'number': '9999999999', 'companyWebsite': 'http://www.xyz.com', 'aboutCompany': 'ABOUT COMPANY TEXT', 'showToJobseeker': 1 }," 




 "postOn": [{ 'platformType': 12, 'forward': { 'emails': ['rajat.dutta@naukri.com','ram.sevak@naukri.com'], 'showToJobseeker': 0 }, 'refresh': { 'frequency': 1, 'startDate': '1493884713', 'stopDate': '1525735820' }, 'responseMode': { 'type': 2, 'fromDate': '1493884713', 'toDate': '1525735820', 'start': { 'time': 8, 'period': 'PM' }, 'externalUrl':'https://csm.naukri.com', 'companyUrl': 'http:/internal.com', 'allowSendQuery' : 1, 'naukriRecEmail' : 'xyz@gmail.com', 'address':{ 'name':'Primary Address', 'addCompanyName':1 }}}];*/
?>



