import { __ } from "@wordpress/i18n";
import { useForm } from "react-hook-form";
// import { isURL } from "@wordpress/url";
import { searchOptions } from "data";
import MultiSelect from "components/MultiSelect";

const App = () => {
	const {
		register,
		getValues,
		setError,
		setValue,
		handleSubmit,
		clearErrors,
		formState: { errors },
	} = useForm({
		defaultValues: {
			current_link: "https://wordpress.org",
			post_types: [searchOptions[1]],
		},
	});
	const handleFormSubmit = () => {
		const values = getValues();

		if (values.post_types.length == 0) {
			setError("post_types", {
				type: "manual",
				message: "No post types",
			});
			return;
		}

		console.info(values);
	};
	const setMultiSelect = (name, options) => {
		setValue(name, options);
		if ("post_types" in errors) {
			clearErrors("post_types");
		}
	};

	console.info(errors);
	return (
		<>
			<div className="hrpl-wrapper">
				<form onSubmit={handleSubmit(handleFormSubmit)}>
					<fieldset>
						<legend> {__("Search Link", "hrrr-replace-links")}:</legend>
						<div>
							<label htmlFor="current_link">
								{__("Current Link", "hrrr-replace-links")}:
							</label>
							<br />
							<input
								type="url"
								id="current_link"
								name="current_link"
								placeholder={__(
									"Enter your link you want to replace",
									"hrrr-replace-links"
								)}
								{...register("current_link", {
									required: "this field is required",
								})}
							/>
						</div>
						<div>
							<label htmlFor="cars">Choose a car:</label>
							<br />
							<MultiSelect
								name="post_types"
								options={searchOptions}
								defaultValue={[searchOptions[1]]}
								onChange={setMultiSelect}
							/>
							{errors?.post_types?.message && (
								<span>{errors?.post_types?.message}</span>
							)}
						</div>
						<br />
						<button type="submit">{__("Search", "hrrr-replace-links")}</button>
					</fieldset>
				</form>
			</div>
		</>
	);
};

export default App;
