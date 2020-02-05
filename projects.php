<?php
header("Access-Control-Allow-Origin: *");

$conn = mysqli_connect('localhost', 'root', '', 'rmdiocera_portf');

if (isset($_GET['pid'])) {
    $id = $_GET['pid'];

    $query = "SELECT project_image.image_name AS image_name, projects.name AS project_name, projects.website_link AS website_link, projects.github_link AS github_link FROM project_image JOIN projects ON projects.id = project_image.project_id WHERE project_id = $id";
    $result = mysqli_query($conn, $query);
    $img_names = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($img_names);
} else if(isset($_GET['details'])) {
    $id = $_GET['details'];

    $query = "SELECT project_features.project_feature AS feature FROM project_features JOIN projects ON projects.id = project_features.project_id WHERE project_id = $id";
    $result = mysqli_query($conn, $query);
    $features = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($features);
}
