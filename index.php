<html>
    <body>
        <form action="" method="post">
            ID:
            <input type=text name="id_text">
            <input type=submit name="s" value="GET">
            <br><br>
    <?php
    //GET Data
    if(isset($_POST['s'])) // here isset function is using to check where a variable is set or not
    {
        $id=$_POST['id_text'];// get value of id text
        if ($id == ""){
            return;
        }
        //if id not empty then will proceed to the fetch
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1:5000/Product/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        //echo "<textarea rows='16' cols='100'>$response</textarea>";
    }
    ?>
       
        <textarea rows='10' cols='100' name='text_area'>
             <?php 
             if(isset($_POST['s'])) // here isset function is using to check where a variable is set or not
             {
             echo $response;
             }
            ?> 
        </textarea>
            <br><br>
            <input type=submit value="POST" name="pst">
            <input type=submit value="PUT" name="put">
            <input type=submit value="DELETE" name="dlt">
            <?php
             //for posting
            if(isset($_POST['pst']))
            {
                $curl = curl_init();
                $text=$_POST['text_area'];//"'" . $_POST['text_area'] ."'";
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://127.0.0.1:5000/Product',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $text,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                //echo $response;
            }
            //for update
            if(isset($_POST['put']))
            {
                $id=$_POST['id_text'];
                $curl = curl_init();
                $text=$_POST['text_area'];//"'" . $_POST['text_area'] ."'";
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://127.0.0.1:5000/Product/'.$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => $text,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                echo $response;
            }
            //for delete
            if(isset($_POST['dlt']))
            {
                $id=$_POST['id_text'];
                $curl = curl_init();
                $text=$_POST['text_area'];//"'" . $_POST['text_area'] ."'";
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://127.0.0.1:5000/Product/'.$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'Delete',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                echo $response;
            }
            ?>
        </form>
    </body>
</html>