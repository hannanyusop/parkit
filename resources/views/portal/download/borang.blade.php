@extends('portal.layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="section-title text-center">
                <h2>Muat Turun Dokumen/Borang</h2>
            </div>
        </div>
    </div>
    <section class="mt--3">
        <div class="container">
            <div class="row">
                <div class="tab">
                    <div class="tab-menu">
                        @foreach(portalGetDownloadGroup() as $key => $group)
                            <button class="tab-menu-link {{ ($key == "muaturun-pelajar")? "active" : "" }}" data-content="{{ $key }}">
                                <span data-title="tender">{{ $group }}</span>
                            </button>
                        @endforeach
                    </div>
                    <div class="tab-bar">
                        @foreach(portalGetDownloadGroup() as $key => $group)
                            <div class="tab-bar-content {{ ($key == "muaturun-pelajar")? "active" : "" }}" id="{{ $key }}">
                                <div class="texts">
                                    <p class="paragraph">

                                        @php $documents = portalGetDownload($key); @endphp
                                        @if($documents->count() == 0)
                                            <p class="alert alert-info">
                                                Tiada Dokumen Berkaitan {{ $group }} Buat Masa Kini
                                            </p>
                                        @else
                                            <div class="col-lg-12">
                                                <div class="accordion" id="group-{{ $key }}">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tr class="bg-success font-weight-bold text-white">
                                                                <td>#</td>
                                                                <td>Tajuk</td>
                                                                <td></td>
                                                            </tr>
                                                            @foreach($documents as $key => $document)
                                                                <tr>
                                                                    <td>{{ $key+1 }}</td>
                                                                    <td>{{ $document->name }}</td>
                                                                    <td><a class="text-info" href="{{ $document->file }}"><i class="fa fa-download"></i> Muat Turun</a> </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        // Tabs Action
        const tabLink = document.querySelectorAll(".tab-menu-link");
        const tabContent = document.querySelectorAll(".tab-bar-content");

        tabLink.forEach((el) => {
            el.addEventListener("click", activeTab);
        });

        function activeTab(el) {
            const btnTarget = el.currentTarget;
            const content = btnTarget.dataset.content;

            tabContent.forEach((el) => {
                el.classList.remove("active");
            });

            tabLink.forEach((el) => {
                el.classList.remove("active");
            });

            document.querySelector("#" + content).classList.add("active");
            btnTarget.classList.add("active");
        }

    </script>
@endsection
