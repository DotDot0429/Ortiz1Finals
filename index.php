<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>

    <?php if (isset($_SESSION['message'])) { ?>
        <h1>    
            <?php echo $_SESSION['message']; ?>
        </h1>
    <?php } unset($_SESSION['message']); ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
        <input type="text" name="searchInput" placeholder="Search here">
        <input type="submit" name="searchBtn">
    </form>

    <p><a href="index.php">Clear Search Query</a></p>
    <p><a href="insert.php">Insert New User</a></p>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Years of Experience</th>
            <th>Actions</th>
        </tr>

        <?php if (!isset($_GET['searchBtn'])) { ?>
            <?php $getAllUsers = getAllUsers($pdo); ?>
            <?php foreach ($getAllUsers as $row) { ?>
                <tr>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['years_of_experience']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <?php $searchForAUser = searchForAUser($pdo, $_GET['searchInput']); ?>
            <?php foreach ($searchForAUser as $row) { ?>
                <tr>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['years_of_experience']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
					</tr>
				<?php } ?>
		<?php } ?>	
		
	</table>
</body>
</html>                        