@extends('layouts.test')

@section('test-description')
    The Hopkins Symptom Checklist (HSCL) merupakan instrumen self-report dengan 25 butir pertanyaan untuk mengukur
    gejala-gejala cemas dan depresi. HSCL-25 merupakan versi singkat dari HSCL-90. Responden diminta untuk mengisi daftar
    pertanyaan yang terdapat di HSCL-25 yang memiliki dua sub skala dengan cutting point 1.75 (α = 0.75)
    <br>
    <br>
    Berikut ini adalah senarai gejala atau masalah yang kadang kala dialami seseorang. Bacalah setiap kalimat
    dengan seksama dan gambarkan seberapa besar gejala tersebut mengganggu atau membuat anda stres dalam jangka waktu satu
    minggu terakhir, termasuk hari ini.
@endsection

@section('test-form')
<form action="{{ route('test-hscl25.submit') }}" class="text-grey" method="POST">
        @csrf
        <ol>
            @foreach ($questions as $question)
                <li class="mb-4">
                    <p class="mb-2">{!! $question->question !!}</p>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil1' }}" value="1"
                            @checked(old('q' . $loop->iteration) == '1')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil1' }}">
                            Sama sekali tidak pernah (<em>Not at all</em>)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil2' }}" value="2"
                            @checked(old('q' . $loop->iteration) == '2')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil2' }}">
                            Sekali-sekali (<em>A little</em>)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil3' }}" value="3"
                            @checked(old('q' . $loop->iteration) == '3')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil3' }}">
                            Agak sering (<em>Sometimes</em>)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('q' . $loop->iteration) is-invalid @enderror" type="radio"
                            name="q{{ $loop->iteration }}" id="{{ 'q' . $loop->iteration . 'pil4' }}" value="4"
                            @checked(old('q' . $loop->iteration) == '4')>
                        <label class="form-check-label" for="{{ 'q' . $loop->iteration . 'pil4' }}">
                            Sering (<em>often</em>)
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
