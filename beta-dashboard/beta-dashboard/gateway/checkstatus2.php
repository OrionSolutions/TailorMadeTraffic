<?php
  include ('../class/clsConnection.php');
  require 'vendor/autoload.php';
  $client = new \GoCardlessPro\Client([
      'access_token' =>'live_gZJP-n7WoRErIDs5disNaRxe14bj8oNdYgogu0BQ',
      'environment' => \GoCardlessPro\Environment::LIVE
  ]);
  $con = new mycon();
  $con->getconnect();

  $sqlsubscription = "SELECT * FROM `tblsubscription` WHERE crm=0";
  $getsubscription = $con->getrecords($sqlsubscription);

  while($rsdata =mysqli_fetch_assoc($getsubscription)) { 
    try{
        if($rsdata["PaymentType"]=="Subscribe_Payment") {
        $subscription = $client->subscriptions()->get($rsdata["UniqueID"]);
        $customer_ID = $subscription->metadata->customer_id;
        $status = $subscription->status;
        $subid = $subscription->id;
        $payment_status =$client->payments()->list();
        $payment_status = $client->payments()->list([
        "params" => ["customer" => $customer_ID]
        ]);
        foreach ($payment_status->records as $payment) {
        $payment_ID = $payment->id;
        $payment_status = $payment->status; 
        }
        $payment_start = $client->payments()->get($payment_ID);
        $payment_charge = $payment_start->charge_date;
    }else{
        $payment = $client->payments()->get($rs["PaymentID"]);
        $payment_status = $payment->status;
        $subscription_amount = ($payment->amount)/100;
        $charge_date = $payment->charge_date;
        $paymentID = $payment->id;
    }
    }catch(Exception $error){
        $_SESSION['error_handler'] = $error->getMessage();
    }
    
    switch($payment_status) {
        case "pending_submission":           
        if($rsdata["PaymentType"]=="Subscribe_Payment") {
                 $var="Active";
                 $color="green";
                 $updateSubscription="UPDATE `tblsubscription` SET crm=1,Status=1 WHERE UniqueID='".$rsdata["UniqueID"]."';";
                 $RSUpdate = $con->getrecords($updateSubscription);
                 $sqlaccount = "SELECT * FROM `tblaccount` WHERE `tblaccount`.`AccountID`='".$rsdata["AccountID"]."';";
                 $getaccount = $con->getrecords($sqlaccount);
                 $rsacc = $con->getresult($getaccount);
       
                 $sqlinvoice = "SELECT LPAD( MAX(`tblsubscription`.`SubscriptionID`), 11, '0') AS MAX
                 FROM `tblsubscription` WHERE `tblsubscription`.`UniqueID`='".$rsdata["UniqueID"]."';";
                    $getinvoicenumber = $con->getrecords($sqlinvoice);
                    $rsinvoice = $con->getresult($getinvoicenumber);
                    $invoicenumber = $rsinvoice["MAX"];
                    $accname = $rsacc["Firstname"]." ".$rsacc["Lastname"];
                    $websites = $rsdata["websitelink"];
                    $phone = $rsacc["Phone"];
                    $company = $rsacc["Company"];
                    $Industry = $rsacc["Industry"];
                    $ch = curl_init('https://crm.zoho.eu/crm/private/xml/Accounts/insertRecords');
                    curl_setopt($ch, CURLOPT_VERBOSE, 1);//standard i/o streams 
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// Turn off the server and peer verification 
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//Set to return data to string ($response) 
                    curl_setopt($ch, CURLOPT_POST, 1);//Regular post 
                    $redir = curl_init('https://crm.zoho.eu/crm/private/xml/Accounts/insertRecords');
                    $authtoken = "ddbb9983706b0694795323fc05b470ef";
                    $xmlData = "<Accounts>
                    <row no='1'>
                    <FL val='Account Name'>$accname</FL>
                    <FL val='Ticker Symbol'>$invoicenumber</FL>
                    <FL val='Description'>Instruction Here $invoicenumber</FL>
                    <FL val='Website'>$websites</FL>
                    <FL val='Ownership'>$accname</FL>
                    <FL val='Phone'>$phone</FL>
                    </row>
                    </Accounts>";
                    $query = "newFormat=1&authtoken=".$authtoken."&scope=crmapi&xmlData=".$xmlData; 
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);// Set the request as a POST FIELD for curl. 
                    curl_setopt($redir,CURLOPT_POSTFIELDS,'');
                    $response = curl_exec($ch);  	
                    curl_close($ch); 
                }else{
                    $var="Active";
                    $color="green";
                    $updateSubscription="UPDATE `tblsubscription` SET crm=1,Status=1 WHERE PaymentID='".$rsdata["PaymentID"]."';";
                    $RSUpdate = $con->getrecords($updateSubscription);
                    $sqlaccount = "SELECT * FROM `tblaccount` WHERE `tblaccount`.`AccountID`='".$rsdata["AccountID"]."';";
                    $getaccount = $con->getrecords($sqlaccount);
                    $rsacc = $con->getresult($getaccount);   
                    $sqlinvoice = "SELECT LPAD( MAX(`tblsubscription`.`SubscriptionID`), 11, '0') AS MAX
                    FROM `tblsubscription` WHERE `tblsubscription`.`UniqueID`='".$rsdata["PaymentID"]."';";    
                    $getinvoicenumber = $con->getrecords($sqlinvoice);
                    $rsinvoice = $con->getresult($getinvoicenumber);
                    $invoicenumber = $rsinvoice["MAX"];
                    $accname = $rsacc["Firstname"]." ".$rsacc["Lastname"];
                    $phone = $rsacc["Phone"];
                    $company = $rsacc["Company"];
                    $Industry = $rsacc["Industry"]; 
                    $OrderInstruction = $rsdata["OrderInstructions"];
                    $ch = curl_init('https://crm.zoho.eu/crm/private/xml/Accounts/insertRecords');
                    curl_setopt($ch, CURLOPT_VERBOSE, 1);//standard i/o streams 
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// Turn off the server and peer verification 
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//Set to return data to string ($response) 
                    curl_setopt($ch, CURLOPT_POST, 1);//Regular post 
                    $redir = curl_init('https://crm.zoho.eu/crm/private/xml/Accounts/insertRecords');
                    $authtoken = "ddbb9983706b0694795323fc05b470ef";
                    $xmlData = "<Accounts>
                    <row no='1'>
                    <FL val='Account Name'>$accname</FL>
                    <FL val='Ticker Symbol'>$invoicenumber</FL>
                    <FL val='Description'>Instruction Here $invoicenumber</FL>
                    <FL val='Ownership'>$accname</FL>
                    <FL val='Phone'>$phone</FL>
                    </row>
                    </Accounts>";
                    $query = "newFormat=1&authtoken=".$authtoken."&scope=crmapi&xmlData=".$xmlData; 
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);// Set the request as a POST FIELD for curl. 
                    curl_setopt($redir,CURLOPT_POSTFIELDS,'');
                    $response = curl_exec($ch);  	
                    curl_close($ch);    
            }
                 break;
    }
  }
?>