import Guest from '@/Layouts/Guest';
import React, { useEffect } from 'react';
import ValidationErrors from '@/Components/ValidationErrors';
import { useForm } from '@inertiajs/inertia-react';
import route from 'ziggy-js';
import {ScreenTitle} from "@/Components/ScreenTitle";
import {SocialButtons} from "@/Components/SocialButtons";
import {EmailPasswordForm} from "@/Components/EmailPasswordForm";

interface Props {
    status: string;
    canResetPassword: boolean;
}

export default function Login({ status, canResetPassword }: Props) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: '',
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const onHandleChange = (event: React.ChangeEvent<HTMLInputElement>) => {
        setData(event.target.name as "email" | "password" | "remember", event.target.type === 'checkbox' ? event.target.checked + '' : event.target.value);
    };

    const submit = (e: React.SyntheticEvent) => {
        e.preventDefault();

        post(route('login'));
    };

    return (
        <Guest previousRoute="welcome">
            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

            <ValidationErrors errors={errors} />

            <ScreenTitle titleName="Log In" />
            <SocialButtons />

            <form style={{paddingTop: "25px"}} onSubmit={submit}>
                <EmailPasswordForm data={data} onHandleChange={onHandleChange} canResetPassword={canResetPassword} processing={processing} buttonText="Log In"/>
            </form>
        </Guest>
    );
}
