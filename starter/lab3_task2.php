<?php

/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 2: JKUAT Grade Classification System [8 marks]
 *
 * IMPORTANT: You must complete pseudocode AND flowchart in your PDF
 * report BEFORE writing any code below. Marks are awarded for all
 * three components: pseudocode, flowchart, and working code.
 *
 * @author     [Seth Almas Wanyonyi]
 * @student    [ENE212-0222/2023]
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       [1st April 2026]
 */
?>
// ── Test Data Set A (change values to run other test sets) ─────────────────
$name = "Your Name";
$cat1 = 8; // out of 10
$cat2 = 7; // out of 10
$cat3 = 9; // out of 10
$cat4 = 6; // out of 10
$exam = 52; // out of 60

// ── Grade Rules (implement using if-elseif-else, ordered highest first) ────
// A (Distinction): Total >= 70
// B+ (Credit Upper): Total >= 65
// B (Credit Lower): Total >= 60
// C+ (Pass Upper): Total >= 55
// C (Pass Lower): Total >= 50
// D (Marginal Pass): Total >= 40
// E (Fail): Total < 40

    // ── Eligibility Rule (implement using nested if) ───────────────────────────
    // Must have attended at least 3 of 4 CATs (CAT score> 0 counts as attended)
    // AND exam score >= 20
    // Otherwise: "DISQUALIFIED — Exam conditions not met"

    // ── Supplementary Rule (implement using ternary) ──────────────────────────
    // If grade is D: "Eligible for Supplementary Exam"
    // Otherwise: "Not eligible for supplementary"

    // ── STEP 1: Compute total ─────────────────────────────────────────────────
    // TODO: compute $total


    // ── STEP 2: Count CATs attended ───────────────────────────────────────────
    // TODO: compute $cats_attended (each CAT > 0 counts as attended)


    // ── STEP 3: Eligibility check (nested if) ─────────────────────────────────
    // TODO: nested if — eligibility → grade classification → supplementary ternary


    // ── STEP 4: Display formatted HTML report card ────────────────────────────
    // TODO: output a clear, formatted report card showing:
    // student name, each CAT score, exam score, total,
    // cats attended, eligibility status, grade, remark, supplementary status


    // ── Required Test Data Sets — screenshot each ─────────────────────────────
    // Set A: cat1=8, cat2=7, cat3=9, cat4=6, exam=52 → expect grade B
    // Set B: cat1=9, cat2=8, cat3=0, cat4=9, exam=55 → expect grade A (check cats_attended)
    // Set C: cat1=0, cat2=0, cat3=7, cat4=0, exam=48 → expect DISQUALIFIED
    // Set D: cat1=5, cat2=4, cat3=6, cat4=3, exam=22 → expect grade D + supp eligible
    // Set E: cat1=0, cat2=0, cat3=0, cat4=0, exam=15 → expect DISQUALIFIED
    <?php
    $cat1 = 0;
    $cat2 = 0;
    $cat3 = 0;
    $cat4 = 0;
    $exam = 15;

    // 1. Calculate Attendance
    $cats_attended = 0;
    if ($cat1 > 0) $cats_attended++;
    if ($cat2 > 0) $cats_attended++;
    if ($cat3 > 0) $cats_attended++;
    if ($cat4 > 0) $cats_attended++;

    $total = $cat1 + $cat2 + $cat3 + $cat4 + $exam;
    $output_message = "";

    // 2. Eligibility Rule (Nested IF)
    if ($cats_attended >= 3 && $exam >= 20) {

        // 3. Grading Rules (if-elseif-else, highest first)
        if ($total >= 70) {
            $grade = "A";
            $desc  = "Distinction";
        } elseif ($total >= 65) {
            $grade = "B+";
            $desc  = "Credit Upper";
        } elseif ($total >= 60) {
            $grade = "B";
            $desc  = "Credit Lower";
        } elseif ($total >= 55) {
            $grade = "C+";
            $desc  = "Pass Upper";
        } elseif ($total >= 50) {
            $grade = "C";
            $desc  = "Pass Lower";
        } elseif ($total >= 40) {
            $grade = "D";
            $desc  = "Marginal Pass";
        } else {
            $grade = "E";
            $desc  = "Fail";
        }

        // 4. Supplementary Rule (Ternary)
        $supp_msg = ($grade == "D") ? "Eligible for Supplementary Exam" : "Not eligible for supplementary";

        $output_message = "Total Score: $total<br>Grade: $grade ($desc)<br>Status: $supp_msg";
    } else {
        // Failure to meet conditions
        $output_message = "<strong>DISQUALIFIED — Exam conditions not met</strong><br>";
        $output_message .= "Reason: Attended $cats_attended CATs and Exam score was $exam.";
    }

    // 5. Final Output (SESE Principle)
    echo "<h2>Student Result Card</h2>";
    echo $output_message;

    ?>