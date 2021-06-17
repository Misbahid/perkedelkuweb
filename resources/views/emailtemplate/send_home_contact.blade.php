<html>
    <?php
    if (isset($emaildata)) {
        $nama = $emaildata->nama;
        $telpon = $emaildata->telpon;
        $email = $emaildata->email;
        $pesan = $emaildata->pesan;
    }
    ?>
    <title>Contact From Website</title>        
    <head></head>    
    <body>    
        <div>
            Dear Admin, 
            <br/>
            <br/>
        </div>        
        <div>
            Ada contact baru dari website :<br/>
            Nama : <?php echo "$nama" ?><br/>
            Telpon : <?php echo "$telpon" ?><br/>
            Email : <?php echo "$email" ?><br/>
            Pesan : <?php echo "$pesan" ?><br/>
        </div>                                
        <div>
            <br/>
            <br/>
            Regards,<br/><br/>          
            This email is an auto generated email by system, please do not reply this email.
        </div>
    </body>
</html>


