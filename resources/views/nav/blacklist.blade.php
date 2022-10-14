<!-- Modal -->
<div class="modal fade" id="blacklist" tabindex="-1" aria-labelledby="blacklistLabel"">
  <div class=" modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header modal-footer--sticky">
      <h5 class="modal-title" id="blacklistLabel">黑名單</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <!-- 內容 -->
    <form action="{{ route('blacklist') }}" method="post">
      @csrf
      <div class="input-group mb-3 px-3 pt-3">
        <input name="blacklist" class="form-control" placeholder="新增黑名單" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
      </div>
    </form>
    <!-- 顯示+刪除黑名單 -->
    <div class="mx-3 d-flex flex-row">
      @foreach($blacklists as $blacklist)
      <form action="{{ route('blacklist.blacklist_del',$blacklist) }}" method="post">
        @csrf
        <div class="btn-group me-2" role="group" aria-label="Basic example">
          <div class="input-group-text px-1" id="btnGroupAddon2">
            <div class="me-2">{{ $blacklist->blacklist }}</div>
            <button type="submit " class="btn-close btn-sm"></button>
          </div>
        </div>
      </form>
      @endforeach
    </div>
    <!-- 按鈕 -->
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">儲存</button>
    </div>
  </div>
</div>
</div>