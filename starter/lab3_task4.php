<?php

/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 4: Nested Conditions — Loan Eligibility Checker [6 marks]
 *
 * IMPORTANT: You must complete pseudocode AND flowchart in your PDF
 * report BEFORE writing any code below.
 *
 * @author     [Seth Almas Wanyonyi]
 * @student    [ENE212-0222/2023]
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       [1st April 2026]
 */
?>
// ── Problem: Student Loan Eligibility System ───────────────────────────────
//
// A student applies for a HELB loan. Eligibility rules (nested):
//
// OUTER CHECK — Is the student enrolled?
// $enrolled = true/false
// If NOT enrolled → "Not eligible — must be an active student"
//
// INNER CHECK 1 — GPA requirement (if enrolled)
// $gpa (float, 0.0–4.0)
// GPA >= 2.0 → proceed to inner check 2
// GPA < 2.0 → "Not eligible — GPA below minimum (2.0)"
    //
    // INNER CHECK 2 — Household income bracket (if enrolled AND GPA>= 2.0)
    // $annual_income (KES)
    // < 100000 → "Eligible — Full loan award"
        // < 250000 → "Eligible — Partial loan (75%)"
        // < 500000 → "Eligible — Partial loan (50%)"
        //>= 500000 → "Not eligible — household income exceeds threshold"
        //
        // ADDITIONAL RULE — Ternary for renewal vs new application:
        // $previous_loan = true/false
        // If eligible: use ternary to append "| Renewal application" or "| New application"

        // ── Test data (change to test all branches) ───────────────────────────────
        //$enrolled = true;
        //$gpa = 3.1;
        //$annual_income = 180000;
        //$previous_loan = false;

        // ── STEP 1: Outer enrollment check ────────────────────────────────────────
        // TODO: nested if structure implementing all rules above


        // ── STEP 2: Display result ────────────────────────────────────────────────
        // TODO: output formatted result showing all input values and the decision


        // ── Required Test Data Sets — screenshot each ─────────────────────────────
        // Set A: enrolled=true, gpa=3.1, income=180000, previous=false → Partial 75%
        // Set B: enrolled=true, gpa=1.8, income=80000, previous=false → GPA fail
        // Set C: enrolled=false, gpa=3.5, income=60000, previous=true → Not enrolled
        // Set D: enrolled=true, gpa=2.5, income=600000, previous=true → Income fail
        // Set E: enrolled=true, gpa=2.0, income=50000, previous=true → Full | Renewal
        <?php
        $enrolled = true;
        $gpa = 2.0;
        $annual_income = 50000;
        $previous_loan = true;

        $final_status = "";

        // 1. OUTER CHECK — Enrollment
        if ($enrolled === true) {

            // 2. INNER CHECK 1 — GPA
            if ($gpa >= 2.0) {

                // 3. INNER CHECK 2 — Income
                if ($annual_income < 100000) {
                    $loan_amount = "Full loan";
                } elseif ($annual_income < 250000) {
                    $loan_amount = "Partial 75%";
                } elseif ($annual_income < 500000) {
                    $loan_amount = "Partial 50%";
                } else {
                    $loan_amount = "Not eligible — Income above limit";
                }

                // 4. TERNARY — Renewal vs New (only if eligible for some loan)
                // We check if the word "Not" is in the loan_amount string
                if (strpos($loan_amount, "Not") === false) {
                    $app_type = ($previous_loan) ? "Renewal application" : "New application";
                    $final_status = "$loan_amount | $app_type";
                } else {
                    $final_status = $loan_amount;
                }
            } else {
                $final_status = "Not eligible — GPA below minimum";
            }
        } else {
            $final_status = "Not eligible — must be an active student";
        }

        // 5. Output (SESE Principle)
        echo "<h2>HELB Eligibility Result</h2>";
        echo "Status: " . $final_status;

        ?>