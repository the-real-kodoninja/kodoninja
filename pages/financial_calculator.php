<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

if (!isLoggedIn()) {
    redirect('/?page=login');
}

$page_title = 'Financial Calculator - Kodoninja';
include BASE_PATH . 'components/header.php';
?>

<section class="financial-calculator">
    <h1>Financial Calculator</h1>
    <form id="financial-calc-form" action="/api/save_financial_calculation.php" method="POST">
        <div class="calc-type">
            <label for="calc-type">Type:</label>
            <select id="calc-type" name="type">
                <option value="savings">Savings Goal</option>
                <option value="investment">Investment Plan</option>
                <option value="budget">Budget Planner</option>
            </select>
        </div>
        <div class="calc-inputs">
            <label for="amount">Amount ($):</label>
            <input type="number" id="amount" name="amount" required>
            <label for="duration">Duration (months):</label>
            <input type="number" id="duration" name="duration" required>
            <label for="interest">Interest Rate (%):</label>
            <input type="number" id="interest" name="interest" step="0.01">
        </div>
        <button type="submit" class="calc-btn">Calculate</button>
    </form>
    <div id="calc-results"></div>
</section>

<?php include BASE_PATH . 'components/footer.php'; ?>
