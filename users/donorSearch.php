<?php
$i=0;
// if(isset($_POST['searchBtn'])){
//     require_once 'php/DBConnect.php';
//     $db = new DBConnect();
    
//     $bloodType = $_POST['blood_group'];
//     $donors = $db->getDonorsByBloodType($bloodType);
// }

require_once 'php/DBConnect.php';
$db = new DBConnect();
// Search by Blood Group
if (isset($_POST['searchBtn'])) {
    $bloodType = $_POST['blood_group'];
    $donors = $db->getDonorsByBloodType($bloodType);
}
//Search By City
if (isset($_POST['searchByCityBtn'])) {
    $city = $_POST['city'];
    $donors = $db->searchDonorByCity($city);
}

$title = "Blood Availability";
$setAvailabilityActive = "active";
include 'layout/_header.php';

include 'layout/navbar.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form class="form-inline" role='form' method="post" action="donorSearch.php">
                <label class="form-label">Select Blood Group: </label>
                <select name="blood_group" class="form-control">
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <button type="submit" class="btn btn-primary" name="searchBtn">Search</button>
            </form>
            <br>
            <div class="form-group">
                <?php if(isset($donors[0])): ?>
                <label>Total number of donors with <?= $donors[0]['b_type']; ?> </label><div class="emphasize"><?= count($donors); ?> Donors</div>
                <table class="table table-condensed">
                    <thead>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>D.O.B</th>
                    <th>Address</th>
                    <th>city</th>
                    <th>Blood Group</th>
                    <th>Contact</th>
                    </thead>
                    <?php foreach($donors as $d): $i++;?>
                    
                    <tr class="<?php if($i%2==0){echo 'bg-success';} else{echo 'bg-success';} ?>">
                    <!-- <a href="../profile.php?id=<?= $d['id']; ?>"> -->
                        <td><?= $d['fname'] ." ".$d['lname']; ?></a></td>
                        <td><?= $d['sex']; ?></td>
                        <td><?= $d['bday']; ?></td>
                        <td><?= wordwrap($d['h_address'],26,'<br>' ); ?></td>
                        <td><?= $d['city']; ?></td>
                        <td><?= $d['b_type']; ?></td>
                        <td><?= $d['mobile']; ?></td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php include 'layout/_footer.php'; ?>
