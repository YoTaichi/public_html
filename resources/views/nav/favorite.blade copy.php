<!-- Modal -->
<div class="modal fade" id="favorite" tabindex="-1" aria-labelledby="favoriteLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-footer--sticky">
        <h5 class="modal-title" id="favoriteLabel">我的最愛</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- 內容 -->
      <form action="{{ route('search.favorite' ) }}" method="post">
        @csrf
        <div class="modal-body p-1">
          <div class=" mb-2">
            <input type="checkbox" value="#巨乳" class="btn-check" id="btncheck1" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck1">巨乳</label>

            <input type="checkbox" value="#貧乳" class="btn-check" id="btncheck2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck2">貧乳</label>

            <input type="checkbox" value="#安價" class="btn-check" id="btncheck3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck3">安價</label>

            <input type="checkbox" value="#和平" class="btn-check" id="btncheck4" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck4">和平</label>

            <input type="checkbox" value="#VT" class="btn-check" id="btncheck5" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck5">VT</label>

            <input type="checkbox" value="#政治" class="btn-check" id="btncheck6" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck6">政治</label>

          </div>
          <div class="">
            搜尋方法
          </div>
          <div class="" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">只有</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">不含</label></label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">測試</label>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">儲存</button>
        </div>
      </form>
    </div>
  </div>
</div>