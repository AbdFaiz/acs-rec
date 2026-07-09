<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';

type Position = {
    id: number;
    name: string;
    description: string | null;
    has_psychotest: boolean;
    region: {
        id: number;
        name: string;
    };
};

defineProps<{
    positions: Position[];
}>();
</script>

<template>
    <Head title="Lowongan" />

    <div class="mx-auto max-w-5xl space-y-6 p-6">
        <div class="rounded-xl border bg-card p-6">
            <h1 class="text-2xl font-semibold">Lowongan Recruitment</h1>
            <p class="mt-2 text-sm text-muted-foreground">
                Pilih posisi yang sesuai, lalu login untuk mengirim lamaran.
            </p>
            <div class="mt-4 flex gap-3">
                <Button as-child>
                    <Link href="/applications/create">Kirim Lamaran</Link>
                </Button>
                <Button as-child variant="outline">
                    <Link href="/login">Login</Link>
                </Button>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <article
                v-for="position in positions"
                :key="position.id"
                class="rounded-xl border bg-card p-5"
            >
                <p class="text-xs text-muted-foreground">
                    {{ position.region.name }}
                </p>
                <h2 class="mt-1 text-lg font-semibold">{{ position.name }}</h2>
                <p class="mt-2 text-sm text-muted-foreground">
                    {{ position.description || 'Deskripsi posisi belum tersedia.' }}
                </p>
                <p class="mt-3 text-xs font-medium">
                    Psikotest:
                    {{ position.has_psychotest ? 'Ya' : 'Tidak' }}
                </p>
            </article>
        </div>
    </div>
</template>
