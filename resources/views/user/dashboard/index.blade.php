@include('template.head')
      <main>
         <div id="app-layout" class="overflow-x-hidden flex">
            <!-- start navbar -->
            @include('user.nav')
            @include('template.top_nav')
         </div>
            <div class="mx-auto p-6 space-y-6">
               <!-- Top cards -->
               <div class="flex flex-wrap gap-6">
               <div class="flex-1 min-w-[220px] bg-white rounded-md shadow-sm p-5 flex items-center justify-between">
               <div>
                  <p class="text-[11px] text-[#475569] mb-1">
                  Total Proyek
                  </p>
                  <p class="text-[18px] font-semibold text-[#2563eb]">
                  {{ $totalTask }}
                  </p>
               </div>
               <div class="w-12 h-10 rounded-md bg-[#dbeafe]">
               </div>
               </div>
               <div class="flex-1 min-w-[220px] bg-white rounded-md shadow-sm p-5 flex items-center justify-between">
               <div>
                  <p class="text-[11px] text-[#475569] mb-1">
                  Dalam Proses
                  </p>
                  <p class="text-[18px] font-semibold text-[#b45309]">
                  {{ $activeTask }}
                  </p>
               </div>
               <div class="w-12 h-10 rounded-md bg-[#fef3c7]">
               </div>
               </div>
               <div class="flex-1 min-w-[220px] bg-white rounded-md shadow-sm p-5 flex items-center justify-between">
               <div>
                  <p class="text-[11px] text-[#475569] mb-1">
                  Selesai
                  </p>
                  <p class="text-[18px] font-semibold text-[#15803d]">
                  {{ $completedTask }}
                  </p>
               </div>
               <div class="w-12 h-10 rounded-md bg-[#dcfce7]">
               </div>
               </div>
               <div class="flex-1 min-w-[220px] bg-white rounded-md shadow-sm p-5 flex items-center justify-between">
               <div>
                  <p class="text-[11px] text-[#475569] mb-1">
                  Jumlah Divisi
                  </p>
                  <p class="text-[18px] font-semibold text-[#b91c1c]">
                  {{ $jumlahDivisi }}
                  </p>
               </div>
               <div class="w-12 h-10 rounded-md bg-[#fee2e2]">
               </div>
               </div>
               </div>
               <div class="bg-white rounded-md shadow-sm p-6 mt-4">
                  <p class="font-semibold text-[13px] mb-6">
                  Progres Produk
                  </p>
                  <table class="w-full table-auto text-[11px] text-[#94a3b8] border-collapse">
   <thead>
      <tr>
         <th class="text-left pl-4 pb-3">NAMA PRODUK</th>
         <th class="text-left pb-3">JUMLAH</th>
         <th class="text-left pb-3">UKURAN</th>
         <th class="text-left pb-3">DEADLINE</th>
         <th class="text-left pb-3 pr-4">STATUS</th>
      </tr>
   </thead>

   <tbody>
      @foreach ($tasks as $task)
      <tr class="text-[#1e293b]">
         <td class="flex items-center gap-4 pl-4 py-3">
            <img src="{{ $task->gambar ?? 'https://via.placeholder.com/48' }}" class="w-12 h-12 rounded-md bg-gray-300" />
            <div class="leading-tight">
               <p class="text-[13px] font-normal">{{ $task->nama_task }}</p>
            </div>
         </td>
         <td class="py-3">{{ $task->jumlah }} pcs</td>
         <td class="py-3">
            <p class="text-[13px] font-normal">{{ $task->ukuran }}</p>
         </td>
         <td class="py-3">
            Deadline:
            <span class="font-semibold text-[13px] text-black">
               {{ \Carbon\Carbon::parse($task->waktu_pengerjaan)->translatedFormat('d F Y') }}
            </span>
         </td>
         <td class="py-3 pr-4">
            {{ ucfirst($task->status) }}
         </td>
      </tr>
      @endforeach
   </tbody>

   <tfoot>
      <tr>
         <td colspan="5" class="text-right pt-4 pr-4 text-sm font-semibold text-slate-600">
            Total Proyek: {{ count($tasks) }}
         </td>
      </tr>
   </tfoot>
</table>

               </div>
            </div>
      </main>
@include('template.footer')
 
