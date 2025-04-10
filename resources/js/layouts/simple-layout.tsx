import { ReactNode } from 'react';

export default function Simple({ children }: { children: ReactNode }) {
    return (
        <>
            <div className="flex flex-row flex-wrap items-center justify-end border-b border-gray-300 bg-gray-100 p-10 md:fixed md:top-0 md:z-20 md:w-full" />
            <div className="mt-20">{children}</div>
        </>
    );
}
