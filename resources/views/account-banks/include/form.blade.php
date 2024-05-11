<div class="row mb-2">
<div class="col-md-6 mb-2">
                               <label for="bank-id">{{ __('Bank') }}</label>
                                    <select class="form-control @error('bank_id') is-invalid @enderror" name="bank_id" id="bank-id"  required>
                                        <option value="" selected disabled>-- {{ __('Select bank') }} --</option>
                                        
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}" {{ isset($accountBank) && $accountBank->bank_id == $bank->id ? 'selected' : (old('bank_id') == $bank->id ? 'selected' : '') }}>
                                {{ $bank->nama_bank }}
                            </option>
                        @endforeach
                                    </select>
                                    @error('bank_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
</div>

    <div class="col-md-6 mb-2">
                <label for="account-number">{{ __('Account Number') }}</label>
            <input type="text" name="account_number" id="account-number" class="form-control @error('account_number') is-invalid @enderror" value="{{ isset($accountBank) ? $accountBank->account_number : old('account_number') }}" placeholder="{{ __('Account Number') }}" required />
            @error('account_number')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
    <div class="col-md-6 mb-2">
                <label for="account-name">{{ __('Account Name') }}</label>
            <input type="text" name="account_name" id="account-name" class="form-control @error('account_name') is-invalid @enderror" value="{{ isset($accountBank) ? $accountBank->account_name : old('account_name') }}" placeholder="{{ __('Account Name') }}" required />
            @error('account_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
</div>