<?php?>
<html>
<head>
    <script type="text/javascript">
        /* p1={"id":10001,"name":"Joy"}
         alert(p1.id); */

        /* person=[
         {"id":10001,"name":"Jerry"},
         {"id":10002,"name":"Tom"},
         {"id":10003,"name":"Tony"}
         ];
         alert(person[1].id+"---"+person[1].name); */

        /* moreClass={
         "firClass":[
         {"id":10001,"name":"Jerry"},
         {"id":10002,"name":"Tom"},
         {"id":10003,"name":"Tony"}
         ],
         "secondClass":[
         {"id":10001,"name":"Jone"},
         {"id":10002,"name":"Mac"},
         {"id":10003,"name":"Nike"}
         ],
         "thirdClass":[
         {"id":10001,"name":"Joy"},
         {"id":10002,"name":"Slience"},
         {"id":10003,"name":"Peter"}
         ]
         }
         alert(moreClass.thirdClass[2].name); */

        people={
            "id":610124,
            "name":"Mike",
            "link":{"tel":8715924,"phone":17490823658},
            "address":[
                {"city":"ShangHai","code":221004},
                {"city":"TianJin","code":210024}
            ]
        }
        alert(people.link.phone);
        alert(people.address[0].city);
    </script>
</head>
<body></body>
</html>
