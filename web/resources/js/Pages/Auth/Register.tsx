import Button from '@/Components/Button';
import Guest from '@/Layouts/Guest';
import Input from '@/Components/Input';
import Label from '@/Components/Label';
import React, { useEffect } from 'react';
import ValidationErrors from '@/Components/ValidationErrors';
import { InertiaLink } from '@inertiajs/inertia-react';
import { useForm } from '@inertiajs/inertia-react';
import route from 'ziggy-js';
import {ScreenTitle} from "@/Components/ScreenTitle";
import {SocialButtons} from "@/Components/SocialButtons";
import {EmailPasswordForm} from "@/Components/EmailPasswordForm";

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const onHandleChange = (event: React.ChangeEvent<HTMLInputElement>) => {
        setData(event.target.name as "name" | "email" | "password" | "password_confirmation", event.target.type === 'checkbox' ? event.target.checked + '' : event.target.value);
    };

    const submit = (e: React.SyntheticEvent) => {
        e.preventDefault();

        post(route('register'));
    };

    return (
        <Guest previousRoute="welcome">
            <ValidationErrors errors={errors} />

            <ScreenTitle titleName="Create Account" />
            <SocialButtons />

            <form style={{paddingTop: "25px"}} onSubmit={submit}>
                <EmailPasswordForm data={data} onHandleChange={onHandleChange} canResetPassword={false} processing={processing} buttonText="Done"/>
            </form>
        </Guest>
    );
}
