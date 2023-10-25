<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Progress Tracking Evaluation Form</title>
</head>
<body class="bg-light">
    <x-client-nav :active="$active"></x-client>

    <div class="container py-5">
        <div class="col-lg-5 mx-auto">
            <form action="/yana/submit-assessment" method="POST">
                @csrf
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="fw-bold">
                            Symptom Assessment
                        </h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Please rate the following symptoms on a scale of 0-4, with 0 being not present at all and 4 being severe.
                        </p>
                        <p class="ms-2 fw-bold">1. Anxiety</p>
                        <div class="ms-5">
                            <div class="form-check">
                                <input value="0" name="anxiety" checked class="form-check-input" type="radio">
                                <label class="form-check-label">Not Present (0)</label>
                            </div>
                            <div class="form-check">
                                <input value="1" name="anxiety" class="form-check-input" type="radio">
                                <label class="form-check-label">Mild (1)</label>
                            </div>
                            <div class="form-check">
                                <input value="2" name="anxiety" class="form-check-input" type="radio">
                                <label class="form-check-label">Moderate (2)</label>
                            </div>
                            <div class="form-check">
                                <input value="3" name="anxiety" class="form-check-input" type="radio">
                                <label class="form-check-label">Severe (3)</label>
                            </div>
                            <div class="form-check">
                                <input value="4" name="anxiety" class="form-check-input" type="radio">
                                <label class="form-check-label">Very Severe (4)</label>
                            </div>
                        </div>

                        <p class="ms-2 fw-bold">2. Depression</p>
                        <div class="ms-5">
                            <div class="form-check">
                                <input value="0" name="depression" checked class="form-check-input" type="radio">
                                <label class="form-check-label">Not Present (0)</label>
                            </div>
                            <div class="form-check">
                                <input value="1" name="depression" class="form-check-input" type="radio">
                                <label class="form-check-label">Mild (1)</label>
                            </div>
                            <div class="form-check">
                                <input value="2" name="depression" class="form-check-input" type="radio">
                                <label class="form-check-label">Moderate (2)</label>
                            </div>
                            <div class="form-check">
                                <input value="3" name="depression" class="form-check-input" type="radio">
                                <label class="form-check-label">Severe (3)</label>
                            </div>
                            <div class="form-check">
                                <input value="4" name="depression" class="form-check-input" type="radio">
                                <label class="form-check-label">Very Severe (4)</label>
                            </div>
                        </div>
                        
                        <p class="ms-2 fw-bold">3. Stress</p>
                        <div class="ms-5">
                            <div class="form-check">
                                <input value="0" name="stress" checked class="form-check-input" type="radio">
                                <label class="form-check-label">Not Present (0)</label>
                            </div>
                            <div class="form-check">
                                <input value="1" name="stress" class="form-check-input" type="radio">
                                <label class="form-check-label">Mild (1)</label>
                            </div>
                            <div class="form-check">
                                <input value="2" name="stress" class="form-check-input" type="radio">
                                <label class="form-check-label">Moderate (2)</label>
                            </div>
                            <div class="form-check">
                                <input value="3" name="stress" class="form-check-input" type="radio">
                                <label class="form-check-label">Severe (3)</label>
                            </div>
                            <div class="form-check">
                                <input value="4" name="stress" class="form-check-input" type="radio">
                                <label class="form-check-label">Very Severe (4)</label>
                            </div>
                        </div>

                        <p class="ms-2 fw-bold">4. Sleep Disturbances</p>
                        <div class="ms-5">
                            <div class="form-check">
                                <input value="0" name="sleep_disturbances" checked class="form-check-input" type="radio">
                                <label class="form-check-label">Not Present (0)</label>
                            </div>
                            <div class="form-check">
                                <input value="1" name="sleep_disturbances" class="form-check-input" type="radio">
                                <label class="form-check-label">Mild (1)</label>
                            </div>
                            <div class="form-check">
                                <input value="2" name="sleep_disturbances" class="form-check-input" type="radio">
                                <label class="form-check-label">Moderate (2)</label>
                            </div>
                            <div class="form-check">
                                <input value="3" name="sleep_disturbances" class="form-check-input" type="radio">
                                <label class="form-check-label">Severe (3)</label>
                            </div>
                            <div class="form-check">
                                <input value="4" name="sleep_disturbances" class="form-check-input" type="radio">
                                <label class="form-check-label">Very Severe (4)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3 shadow">
                    <div class="card-header">
                        <h4 class="fw-bold">Mood and Emotions</h4>
                    </div>
                    <div class="card-body">
                        <p>Answer the following questions regarding your mood and emotions since the last session:</p>

                        <p class="ms-2 fw-bold">1. On a scale of 0-4, how would you describe your overall mood?</p>
                        <div class="ms-5">
                            <div class="form-check">
                                <input value="0" name="mood" checked type="radio" class="form-check-input">
                                <label class="form-check-label">Very Negative (0)</label>
                            </div>
                            <div class="form-check">
                                <input value="1" name="mood" type="radio" class="form-check-input">
                                <label class="form-check-label">Negative (1)</label>
                            </div>
                            <div class="form-check">
                                <input value="2" name="mood" type="radio" class="form-check-input">
                                <label class="form-check-label">Neutral (2)</label>
                            </div>
                            <div class="form-check">
                                <input value="3" name="mood" type="radio" class="form-check-input">
                                <label class="form-check-label">Positive (3)</label>
                            </div>
                            <div class="form-check">
                                <input value="4" name="mood" type="radio" class="form-check-input">
                                <label class="form-check-label">Very Positive (4)</label>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="card mt-3 shadow">
                    <div class="card-header">
                        <h4 class="fw-bold">Progress on Previous Goals</h4>
                    </div>
                    <div class="card-body">


                        <p class="ms-2">Please review the goals we set in the last session. How would you rate your progress toward each one on a scale of 0-4?</p>
                        <div class="ms-5">
                            <div class="form-check">
                                <input value="0" name="progress" checked type="radio" class="form-check-input">
                                <label class="form-check-label">No Progress Made (0)</label>
                            </div>
                            <div class="form-check">
                                <input value="1" name="progress" type="radio" class="form-check-input">
                                <label class="form-check-label">Some Progress Made(1)</label>
                            </div>
                            <div class="form-check">
                                <input value="2" name="progress" type="radio" class="form-check-input">
                                <label class="form-check-label">Moderate Progress Made (2)</label>
                            </div>
                            <div class="form-check">
                                <input value="3" name="progress" type="radio" class="form-check-input">
                                <label class="form-check-label">Significant Progress Made(3)</label>
                            </div>
                            <div class="form-check">
                                <input value="4" name="progress" type="radio" class="form-check-input">
                                <label class="form-check-label">Goals Fully Achieved (4)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="mt-3 w-100 primary-btn py-2">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>