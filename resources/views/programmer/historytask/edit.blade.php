@extends('layouts.programmer')

@section('content')
    <!-- <form action="{{ route('programmer.historytask.update', $task->id) }}" method="POST">
        @csrf
        @if (@$task)
                                @method('PUT')
                            @endif
        <div class="form-group">
            <label for="status">Status Bug</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $task->bug->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="done" {{ $task->bug->status === 'done' ? 'selected' : '' }}>Done</option>
                <div class="form-group">
                <label for="progress">Progress</label>
                <input type="range" name="progress" id="progress" min="0" max="100" step="1" class="form-control" value="{{ $task->bug->progress }}">
            </div>
            </select>
        </div>
        @if ($task->bug->status === 'pending')
            <div class="form-group">
                <label for="progress">Progress</label>
                <input type="text" name="progress" id="progress" class="form-control" value="{{ $task->bug->progress }}">
            </div>
        @elseif ($task->bug->status === 'done')
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="information" id="information" class="form-control" value="{{ $task->bug->keterangan }}">
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Update</button>
    </form> -->
    <form action="{{ route('programmer.historytask.update', $task->id) }}" method="POST" id="taskForm">
    @csrf
    @if (@$task)
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="status">Status Bug</label>
        <select name="status" id="status" class="form-control">
            <option value="pending" {{ $task->bug->status == 'PENDING' ? 'selected' : '' }}>Pending</option>
            <option value="done" {{ $task->bug->status == 'DONE' ? 'selected' : '' }}>Done</option>
        </select>
    </div>
    <div class="form-group">
        <label for="progress">Progress</label>
        <input type="range" name="progress" id="progress" min="0" max="100" step="1" class="form-control" value="{{ $task->bug->progress }}">
    </div>
    <div class="form-group" id="informationField" style="display: none;">
        <label for="information">Keterangan</label>
        <input type="text" name="information" id="information" class="form-control" value="{{ $task->bug->keterangan }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var statusSelect = document.getElementById('status');
    var informationField = document.getElementById('informationField');
    
    statusSelect.addEventListener('change', function() {
        if (statusSelect.value == 'DONE') {
            informationField.style.display = 'block';
        } else {
            informationField.style.display = 'none';
        }
    });
</script>

@endsection