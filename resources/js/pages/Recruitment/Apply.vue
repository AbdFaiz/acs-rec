<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';

type Position = {
    id: number;
    name: string;
    region: {
        id: number;
        name: string;
    };
};

const props = defineProps<{
    positions: Position[];
}>();

const form = useForm({
    full_name: '',
    nickname: '',
    gender: '',
    pob: '',
    dob: '',
    marital_status: '',
    blood_type: '',
    address_ktp: '',
    province_ktp: '',
    city_ktp: '',
    postal_code_ktp: '',
    address_current: '',
    province_current: '',
    city_current: '',
    postal_code_current: '',
    religion: '',
    ethnic: '',
    ktp_number: '',
    kk_number: '',
    sim_c: '',
    sim_a_b: '',
    weight: '',
    height: '',
    facebook: '',
    instagram: '',
    position_id: '',
});

const submit = () => {
    form.post('/applications');
};
</script>

<template>
    <Head title="Apply Lamaran" />

    <div class="mx-auto max-w-5xl space-y-6 p-6">
        <div class="rounded-xl border bg-card p-6">
            <h1 class="text-xl font-semibold">Form Lamaran Kandidat</h1>
            <p class="mt-2 text-sm text-muted-foreground">
                Isi data sesuai KTP dan data asli Anda.
            </p>
        </div>

        <form @submit.prevent="submit" class="space-y-6 rounded-xl border bg-card p-6">
            <div class="grid gap-4 md:grid-cols-2">
                <div class="space-y-2">
                    <Label for="full_name">Nama Lengkap</Label>
                    <Input id="full_name" v-model="form.full_name" />
                    <InputError :message="form.errors.full_name" />
                </div>
                <div class="space-y-2">
                    <Label for="nickname">Nama Panggilan</Label>
                    <Input id="nickname" v-model="form.nickname" />
                    <InputError :message="form.errors.nickname" />
                </div>
                <div class="space-y-2">
                    <Label for="position_id">Posisi Dilamar</Label>
                    <select
                        id="position_id"
                        v-model="form.position_id"
                        class="border-input bg-background w-full rounded-md border px-3 py-2 text-sm"
                    >
                        <option value="">Pilih posisi</option>
                        <option v-for="position in props.positions" :key="position.id" :value="position.id">
                            {{ position.name }} - {{ position.region.name }}
                        </option>
                    </select>
                    <InputError :message="form.errors.position_id" />
                </div>
                <div class="space-y-2">
                    <Label for="gender">Jenis Kelamin</Label>
                    <select id="gender" v-model="form.gender" class="border-input bg-background w-full rounded-md border px-3 py-2 text-sm">
                        <option value="">Pilih</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                    <InputError :message="form.errors.gender" />
                </div>
                <div class="space-y-2">
                    <Label for="pob">Tempat Lahir</Label>
                    <Input id="pob" v-model="form.pob" />
                    <InputError :message="form.errors.pob" />
                </div>
                <div class="space-y-2">
                    <Label for="dob">Tanggal Lahir</Label>
                    <Input id="dob" type="date" v-model="form.dob" />
                    <InputError :message="form.errors.dob" />
                </div>
                <div class="space-y-2">
                    <Label for="marital_status">Status Pernikahan</Label>
                    <select id="marital_status" v-model="form.marital_status" class="border-input bg-background w-full rounded-md border px-3 py-2 text-sm">
                        <option value="">Pilih</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Cerai">Cerai</option>
                        <option value="Janda/Duda">Janda/Duda</option>
                    </select>
                    <InputError :message="form.errors.marital_status" />
                </div>
                <div class="space-y-2">
                    <Label for="blood_type">Golongan Darah</Label>
                    <select id="blood_type" v-model="form.blood_type" class="border-input bg-background w-full rounded-md border px-3 py-2 text-sm">
                        <option value="">Pilih</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                    <InputError :message="form.errors.blood_type" />
                </div>
                <div class="space-y-2">
                    <Label for="religion">Agama</Label>
                    <Input id="religion" v-model="form.religion" />
                    <InputError :message="form.errors.religion" />
                </div>
                <div class="space-y-2">
                    <Label for="ethnic">Suku</Label>
                    <Input id="ethnic" v-model="form.ethnic" />
                    <InputError :message="form.errors.ethnic" />
                </div>
                <div class="space-y-2">
                    <Label for="ktp_number">Nomor KTP</Label>
                    <Input id="ktp_number" v-model="form.ktp_number" />
                    <InputError :message="form.errors.ktp_number" />
                </div>
                <div class="space-y-2">
                    <Label for="kk_number">Nomor KK</Label>
                    <Input id="kk_number" v-model="form.kk_number" />
                    <InputError :message="form.errors.kk_number" />
                </div>
                <div class="space-y-2">
                    <Label for="weight">Berat Badan (Kg)</Label>
                    <Input id="weight" type="number" step="0.01" v-model="form.weight" />
                    <InputError :message="form.errors.weight" />
                </div>
                <div class="space-y-2">
                    <Label for="height">Tinggi Badan (Cm)</Label>
                    <Input id="height" type="number" step="0.01" v-model="form.height" />
                    <InputError :message="form.errors.height" />
                </div>
                <div class="space-y-2">
                    <Label for="sim_c">SIM C</Label>
                    <Input id="sim_c" v-model="form.sim_c" />
                </div>
                <div class="space-y-2">
                    <Label for="sim_a_b">SIM A/B</Label>
                    <Input id="sim_a_b" v-model="form.sim_a_b" />
                </div>
                <div class="space-y-2">
                    <Label for="facebook">Facebook</Label>
                    <Input id="facebook" v-model="form.facebook" />
                </div>
                <div class="space-y-2">
                    <Label for="instagram">Instagram</Label>
                    <Input id="instagram" v-model="form.instagram" />
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div class="space-y-2">
                    <Label for="address_ktp">Alamat KTP</Label>
                    <textarea id="address_ktp" v-model="form.address_ktp" class="border-input bg-background min-h-24 w-full rounded-md border px-3 py-2 text-sm"></textarea>
                    <InputError :message="form.errors.address_ktp" />
                </div>
                <div class="space-y-2">
                    <Label for="address_current">Alamat Domisili Saat Ini</Label>
                    <textarea id="address_current" v-model="form.address_current" class="border-input bg-background min-h-24 w-full rounded-md border px-3 py-2 text-sm"></textarea>
                    <InputError :message="form.errors.address_current" />
                </div>
                <div class="space-y-2">
                    <Label for="province_ktp">Provinsi KTP</Label>
                    <Input id="province_ktp" v-model="form.province_ktp" />
                </div>
                <div class="space-y-2">
                    <Label for="city_ktp">Kota KTP</Label>
                    <Input id="city_ktp" v-model="form.city_ktp" />
                </div>
                <div class="space-y-2">
                    <Label for="postal_code_ktp">Kode Pos KTP</Label>
                    <Input id="postal_code_ktp" v-model="form.postal_code_ktp" />
                </div>
                <div class="space-y-2">
                    <Label for="province_current">Provinsi Domisili</Label>
                    <Input id="province_current" v-model="form.province_current" />
                </div>
                <div class="space-y-2">
                    <Label for="city_current">Kota Domisili</Label>
                    <Input id="city_current" v-model="form.city_current" />
                </div>
                <div class="space-y-2">
                    <Label for="postal_code_current">Kode Pos Domisili</Label>
                    <Input id="postal_code_current" v-model="form.postal_code_current" />
                </div>
            </div>

            <Button type="submit" :disabled="form.processing">
                <Spinner v-if="form.processing" />
                Submit Lamaran
            </Button>
        </form>
    </div>
</template>
