<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Gifts</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="row g-5 mt-5">
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Perfect Gift</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form class="needs-validation" method="POST" action="/gift">
                        @csrf
                        <div class="row g-3">

                            <div class="col-12">
                                <label for="address2" class="form-label">Gift Ideas</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Enter awesome gift ideas" name="gift_idea" style="height:300px;"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="country" class="form-label">Whatsapp Number</label>
                                <select class="form-select" name="whatsapp_number" required>
                                    <option value="test">Choose...</option>
                                    @foreach ($numbers as $number)
                                        <option value="{{ $number->whatsapp_number }}">{{ $number->whatsapp_number }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </main>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>
