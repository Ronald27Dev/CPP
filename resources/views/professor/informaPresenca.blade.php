<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presença de Alunos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Ficha de Alunos</h2>
    <form>
        <div class="form-group">
            <label for="attendanceDate">Data de Presença</label>
            <input type="date" class="form-control" id="attendanceDate" name="attendanceDate" required">
        </div>

        <div class="form-group">
            <label>Student 1</label>
            <div class="row">
                <div class="col">
                    <input type="radio" id="student1Yes" name="student1" value="yes" required>
                    <label for="student1Yes">Present</label>
                </div>
                <div class="col">
                    <input type="radio" id="student1No" name="student1" value="no">
                    <label for="student1No">Absent</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Student 2</label>
            <div class="row">
                <div class="col">
                    <input type="radio" id="student2Yes" name="student2" value="yes" required>
                    <label for="student2Yes">Present</label>
                </div>
                <div class="col">
                    <input type="radio" id="student2No" name="student2" value="no">
                    <label for="student2No">Absent</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Student 3</label>
            <div class="row">
                <div class="col">
                    <input type="radio" id="student3Yes" name="student3" value="yes" required>
                    <label for="student3Yes">Present</label>
                </div>
                <div class="col">
                    <input type="radio" id="student3No" name="student3" value="no">
                    <label for="student3No">Absent</label>
                </div>
            </div>
        </div>

        <!-- Add more students as needed -->
        
        <button type="submit" class="btn btn-primary">Submit Responses</button>
    </form>
</div>

<script>

    function toDateInputValue(dateObject){
        const local = new Date(dateObject);
        local.setMinutes(dateObject.getMinutes() - dateObject.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    };

    document.getElementById('attendanceDate').value = toDateInputValue(new Date());

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
