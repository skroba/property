<?php
require_once 'model/DAO.php';
$dbc = new DAO;
$results = $dbc->townSelect($_GET['q']);
$results = explode(',', $results['blocks']);

?>
<div class="form-group select">
        <select class="form-control" id="block" name="block" >
        <option selected disabled>Sva naselja</option>
<?php foreach ($results as $key => $value): ?>
   <option id="txtHint"><?php echo $value ?></option>

<?php endforeach?>

</select>
        </div>