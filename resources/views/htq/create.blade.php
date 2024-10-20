@extends('layouts.test')

@section('test-description')
    The Harvard Trauma Quistionaire (HTQ) atau disebut juga skala trauma psikologi bertujuan untuk mengukur kondisi
    traumatis seseorang dalam variasi gejala-gejala emosional yang terkait. HTQ dikembangkan oleh Harvard Program in
    Refugees Trauma (HPRT) untuk asesmen penyintas Gempa di Kobe, Jepang pada tahun 1995.
    <br><br>
    Berikut ini adalah berbagai gejala yang kadang kala dialami seseorang setelah mengalami peristiwa menyakitkan atau
    mengerikan dalam kehidupannya. Perhatikanlah setiap kalimat dengan seksama dan ingat-ingatlah seberapa sering hal
    tersebut dirasakan mengganggu anda selama beberapa minggu terakhir, termasuk hari ini.
@endsection

@section('test-form')
    <form action="{{ route('test-htq.submit') }}" class="text-grey" method="POST">
        @csrf
        <ol>
            @foreach ($questions as $question)
                <li class="mb-4">
                    <p class="mb-2">{{ $question->question }}</p>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil1' }}" value="1"
                            @checked(old('q' . $loop->iteration) == '1')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil1' }}">
                            Sama sekali tidak pernah (Not at all)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil2' }}" value="2"
                            @checked(old('q' . $loop->iteration) == '2')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil2' }}">
                            Sekali-sekali (A little)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil3' }}" value="3"
                            @checked(old('q' . $loop->iteration) == '3')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil3' }}">
                            Agak sering (Sometimes)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil4' }}" value="4"
                            @checked(old('q' . $loop->iteration) == '4')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil4' }}">
                            Sering (often)
                        </label>
                    </div>
                    @error("q$loop->iteration")
                        <div class="invalid-feedback d-block">Mohon jawab pertanyaan ini.</div>
                    @enderror
                </li>
            @endforeach
        </ol>
        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mt-3">Submit</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kumpulkan Tes?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda yakin ingin mengumpulkan tes ini? Anda tidak bisa mengubah jawaban setelah mengumpulkan tes.
                        <br>
                        <br>
                        Pastikan anda sudah menjawab semua pertanyaan, dan jawaban anda sudah benar.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
