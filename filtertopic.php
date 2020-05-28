
<?php

$q = intval($_GET['q']);
if($q==0){
//tat ca du lieu
$sql = "SELECT *
FROM topic 
inner join topic_type on topic.topic_type=topic_type.id
inner join topic_status on topic.topic_status = topic_status.id";
}else{
    $sql = "SELECT *
    FROM topic 
    inner join topic_type on topic.topic_type=topic_type.id
    inner join topic_status on topic.topic_status = topic_status.id
    WHERE topic.topic_teacher='2'
    ";
    
}
$con = new mysqli("localhost", "root", "", "ttcnweb");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$result = mysqli_query($con,$sql);

// echo "<table>
// <tr>
// <th>STT</th>
// <th>Ten de tai</th>
// <th>Loai de tai</th>
// <th>Mo ta</th>
// <th>Ngay tao</th>
// <th>Trang thai</th>
// <th>Danh sach</th>
// </tr>";
echo '<tbody>';
while($row = mysqli_fetch_array($result)) {
    '<a href="topicdetail.php?topicid=<?php echo $topic_id ?>"><?php echo $topic_name ?></a>';

    $topic_id = $row['topic_id'];
    $topic_name = $row['topic_name'];
    $topic_type = $row['topic_type_name'];
    $topic_description = $row['topic_description'];
    $topic_status = $row['name_status'];
    $date = date_create($row['topic_datecreate']);
    $topic_datecreate = date_format($date, "d/m/Y");

    
    echo "<tr>";
    echo "<td>" . 'stt'. "</td>";
    echo '<td> <a href="topicdetail.php?topicid='.$topic_id.'">'.$topic_name.'</a> </td>';
    echo "<td>" . $topic_type  . "</td>";
    echo "<td>" .  $topic_description . "</td>";
    echo "<td>" . $topic_status . "</td>";
    echo "<td>" . $topic_datecreate. "</td>";
    echo "<td>" . 'danh sach'. "</td>";
    echo "</tr>";
}
// echo "</table>";
echo '</tbody>';
mysqli_close($con);
?>
