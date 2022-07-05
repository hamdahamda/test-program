<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>

<body>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

                </div>
                <div class="modal-body">
                    <!-- Use to Initialize select2 -->
                    <select id='sel_users'>
                        <option value=''>-- Select User--</option>
                        <option value='yogesh'>Yogesh Singh</option>
                        <option value='sonarika'>Sonarika Bhadoria</option>
                        <option value='anil'>Anil Singh</option>
                        <option value='akilesh'>Akilesh Sahu</option>
                    </select>

                    <br><br>
                    <!-- Use to set an option selected in the First dropdown -->
                    Set selected:
                    <select id='user_selected'>
                        <option value=''>-- Select User--</option>
                        <option value='yogesh'>Yogesh Singh1</option>
                        <option value='sonarika'>Sonarika Bhadoria1</option>
                        <option value='anil'>Anil Singh1</option>
                        <option value='akilesh'>Akilesh Sahu1</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('#sel_users').select2({
        width: '100%',
        dropdownParent: $("#exampleModal")
    })
</script>

</html>