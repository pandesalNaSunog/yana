<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Library</title>
</head>
<body>
    <x-toast></x-toast>
    <x-client-nav></x-client-nav>

    <h3 class="fw-bold text-center mt-5 text-primary-color">
        Common Somatic Symptoms Related to Psychological Disorder and Possible Solutions
    </h3>
    <div class="container py-5">
        <div class="accordion" id="accordionExample">
            @foreach($data as $datum)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$datum['accordion_id']}}">
                        <strong>{{$datum['category']}}</strong>
                    </button>
                </h2>
                <div id="{{$datum['accordion_id']}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    @foreach($datum['solutions'] as $solution)
                    <div class="accordion-body">
                        {{$solution->solution}}
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>