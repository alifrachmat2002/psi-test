@extends('layouts.test')

@section('test-description')
    General Health Questionaire (GHQ) atau kondisi kesehatan mental umum terdiri dari
    12 aitem yang akan mengidentifikasi distress psikologis individu dalam beberapa minggu terakhir. GHQ-12 (α =
    0.82)
    didesain dalam setting klinis untuk mendeteksi secaara individual terkait kondisi Kesehatan mental. GHQ
    dikembangkan
    oleh Goldberg dan Hiller (1979).
    <br>
    <br>
    Silahkan jawab pertanyaan berikut dengan jujur dan sejujurnya. Pilih salah satu jawaban yang paling mendekati
    kondisi anda dalam beberapa minggu terakhir. Jawaban anda akan membantu kami dalam menilai kondisi kesehatan.
    Jawaban anda bersifat rahasia dan tidak akan disebarkan ke pihak manapun.
@endsection

@section('test-form')
    <form action="{{ route('test-ghq.submit') }}" class="text-grey" method="POST">
        @csrf
        <ol>
            @foreach ($questions as $question)
                <li class="mb-4">
                    <p class="mb-2">{{ $question->question }}</p>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil1' }}" value="0.1"
                            @checked(old('q' . $loop->iteration) == '0.1')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil1' }}">
                            {{ $question->pil1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil2' }}" value="0.2"
                            @checked(old('q' . $loop->iteration) == '0.2')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil2' }}">
                            {{ $question->pil2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil3' }}" value="1.1"
                            @checked(old('q' . $loop->iteration) == '1.1')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil3' }}">
                            {{ $question->pil3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil4' }}" value="1.2"
                            @checked(old('q' . $loop->iteration) == '1.2')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil4' }}">
                            {{ $question->pil4 }}
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


