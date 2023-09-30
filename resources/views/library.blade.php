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

    <div class="container py-5">
        <div class="accordion">
            @foreach($data as $datum)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{$datum['accordion_id']}}" aria-expanded="true" aria-controls="collapseOne">
                        {{$datum['category']}}
                    </button>
                </h2>
                <div id="{{$datum['accordion_id']}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
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