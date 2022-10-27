<?php 

    $daysWork = 0.00;
    $employeeStatus = '';
    $civilStatus = '';

    $grossSalary = 0.00;
    $tax = 0;
    $deduction = 0.00;
    $netSalary = 0.00;

    $single = 12;
    $married = 10;
    $widow=7;

    // CALCULATE GROSS SALARY
    //multiply days of work hours by salary rate (regular, probationary, casual)

    //CALCULATE DEDUCTION 
    //multiply gross salary to tax

    //CALCULATE NET SALARY
    //subtract gross salary in deduction

    if(isset($_POST["compute"])){
        $daysWork = $_POST['numberOfDays'];
        $employeeStatus = $_POST["employeeStatus"];
        $civilStatus = $_POST["civilStatus"];

        if($employeeStatus === 'Regular'){
            $grossSalary = $daysWork * 500;
        }elseif ($employeeStatus === 'Probationary') {
            $grossSalary = $daysWork * 400;
        }elseif ($employeeStatus === 'Casual') {
            $grossSalary = $daysWork * 300;
        }

        // civil status
        if($civilStatus === 'Single'){
            $tax = $single;
        }elseif($civilStatus === 'Widow'){
            $tax = $widow;
        }elseif($civilStatus === 'Married'){
            $tax = $married;
        }
        else{
            $tax = 0;
        }

        $deduction = ($grossSalary * $tax) / 100;
        $netSalary = $grossSalary - $deduction;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/styles.css">
    <title>Employee Salary</title>
</head>
<body>
    <main>
        <div class="container">
            <h1>Employee Salary</h1>
            <div>
                <form action="" method="POST">

                    <!-- number of days -->
                    <div class="flex numberOfDays">
                        <label for="numberOfDays">No. of Days of Worked</label>
                        <input type="number" id="numberOfDays" name="numberOfDays">
                    </div>

                    <!-- employee status -->
                    <div class="flex employeeStatus">
                        <label for="employeeStatus">Employee Status</label>
                        <select id="employeeStatus" name="employeeStatus">
                            <option selected disabled>Emp. Status</option>
                            <option>Regular</option>
                            <option>Probationary</option>
                            <option>Casual</option>
                        </select>
                    </div>

                    <!-- civil status -->
                    <div class="flex civilStatus">
                        <label for="civilStatus">Civil Status</label>
                        <select id="civilStatus" name="civilStatus">
                            <option selected disabled>Civil Status</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widow</option>
                        </select>
                    </div>

                    <!-- submit button -->
                    <div>   
                        <button name="compute">
                            Compute Salary
                        </button>
                    </div>
                </form>

                <!-- output -->
                <div class="output">
                    <div class="grossSalary">
                        <h4>Gross Salary: <span><?php echo number_format($grossSalary); ?></span> </h4>
                    </div>
                    <div class="Tax">
                        <h4>Tax: <span><?php echo $tax; ?>%</span> </h4>
                    </div>
                    <div class="deduction">
                        <h4>Deduction: <span><?php echo number_format($deduction); ?></span> </h4>
                    </div>
                    <div class="netSalary">
                        <h4>Net Salary: <span><?php echo number_format($netSalary); ?></span> </h4>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
</html>