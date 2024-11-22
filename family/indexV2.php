<?php include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/model/dbConnection.php' );?>

<?php
    function getFamilyTree($ids, $conn, $flag = false){
        $tree = [];

        if($flag){
            $sql = "SELECT * FROM family WHERE id IN ($ids) ORDER BY sequence ASC";
        }else{
            $sql = "SELECT * FROM family WHERE parent_id IN ($ids) ORDER BY sequence ASC";
        }

        $mainSQL = mysqli_query($conn, $sql);

        if (mysqli_num_rows($mainSQL) > 0) {
            while($row = mysqli_fetch_assoc($mainSQL)) {
                $tempStruct["id"] = $row["id"];
                $tempStruct["name"] = $row["name"];
                $tempStruct["gender"] = $row["gender"];
                $tempStruct["spouse"] = spouseDetails($row["id"], $conn);
                $sendIds = $row["id"];

                foreach ($tempStruct["spouse"] as $spouse) {
                    $sendIds = $sendIds . ',' . $spouse["id"];
                }

                $tempStruct["kids"] = getFamilyTree($sendIds, $conn);

                array_push( $tree,$tempStruct);
            }
        }
        return $tree;
    }

    function spouseDetails($id, $conn){
        $tree = [];

        $sql = "SELECT * FROM family WHERE spouse_id = $id ORDER BY sequence ASC";
        $mainSQL = mysqli_query($conn, $sql);

        if (mysqli_num_rows($mainSQL) > 0) {
            while($row = mysqli_fetch_assoc($mainSQL)) {
                $tempStruct["id"] = $row["id"];
                $tempStruct["name"] = $row["name"];
                $tempStruct["gender"] = $row["gender"];

                array_push( $tree,$tempStruct);
            }
        }
        return $tree;
    }

    $parentIds = 0;
    $firstSQL = "SELECT id FROM family WHERE isRoot = 1 AND parent_id = 0  ORDER BY sequence ASC";
    $firstSqlQuery = mysqli_query($conn, $firstSQL);
    
    if (mysqli_num_rows($firstSqlQuery) > 0) {
        while($row = mysqli_fetch_assoc($firstSqlQuery)) {
            $parentIds = $parentIds . ',' . $row["id"];
        }
    }
    
    $familyTree = getFamilyTree($parentIds, $conn, true);
?>

<html>
    <head>
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="Expires" CONTENT="-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Family Tree</title>
        
        <style>



            /* .tree li div .spacer {
                background-color: lightblue;
                display: inline-block;
                width: 10px;
            } */

            /* .tree h1{
                font-size: x-large;
                color: blue;
                background-color: lightgray;
                padding: 10px;
                text-align: center;
            }

            .detailsBox .male, .detailsBox .female{
                padding: 10px;
                border-radius: 5px;
                margin: 5px;
            }

            .detailsBox .male{
                background-color: lightblue;
            }

            .detailsBox .female{
                background-color: lightpink;
            }

            .detailsBox{
                width: 80px;
                position: fixed;
                border: 3px solid #2a42dd52;
                border-radius: 12px;
                margin: 5px;
                z-index: 10;
            } */
        </style>
        <link href="cssV2.css" rel="stylesheet">
    </head>

    <body>
        <div class="px-5 pt-2 fixed-top">
            <div class="d-inline-block border rounded float-start text-center p-2 m-2 maleBox">
                <div class="py-4 my-1">Male</div>
            </div>
            <div class="d-inline-block border rounded float-start p-2 m-2">
                <div class="form-check">
                    <input class="form-check-input" name="color-scheme" type="radio" value="light dark" id="System" checked>
                    <label class="form-check-label" for="System">System</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="color-scheme" type="radio" value="light" id="Light">
                    <label class="form-check-label" for="Light">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="color-scheme" type="radio" value="dark" id="Dark">
                    <label class="form-check-label" for="Dark">Dark</label>
                </div>
            </div>
            <div class="d-inline-block border rounded float-end text-center p-2 m-2 femaleBox">
                <div class="py-4 my-1">Female</div>
            </div>
            <div class=" border rounded text-center p-2 m-2  titleBox">
                <div>hello</div>
            </div>
        </div>
        <div class="p-4 m-5">
        </div>
        <div class="tree px-5">
            <!-- <h1>Family Tree</h1> -->
            <!-- <div class="detailsBox">
                <div class="male">Male</div>
                <div class="female">Female</div>
            </div> -->
            <?php
                showFamilyTree($familyTree);

                function showFamilyTree($tree){
                    echo '<ul class="position-relative pt-4">';
                    foreach ($tree as $item) {
                        echo '<li class="position-relative float-start text-center">';

                        if($item["gender"] == "F"){
                            $gender = 'female rounded p-2';
                        }else{
                            $gender = 'male rounded p-2';
                        }
                        
                        $name = '<span class="'.$gender.'">' . $item['name'] . '</span>';
                            
                        foreach( $item['spouse'] as $sp){
                            
                            if($sp["gender"] == "F"){
                                $gender = 'female rounded p-2';
                            }else{
                                $gender = 'male rounded p-2';
                            }

                            $name = $name . '<br><span class="'.$gender.'" style="margin-top: 10px;">' . $sp['name'] . '</span>';
                        }
                        
                        echo '<div class="text-decoration-none rounded p-2 ">';
                        echo $name;
                        echo '</div>';

                        showFamilyTree($item['kids']);

                        echo "</li>";
                    }
                    echo "</ul>";
                }
            ?>
        </div>
    </body>
</html>