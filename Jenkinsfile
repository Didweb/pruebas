#!groovy

def handleCheckout = {
	sh "echo 'Checking out a merge request...'"
	def credentialsId = scm.userRemoteConfigs[0].credentialsId
	checkout ([
		$class: 'GitSCM',
		branches: [[name: "${env.gitlabSourceNamespace}/${env.gitlabSourceBranch}"]],
		extensions: [
			[$class: 'PruneStaleBranch'],
			[$class: 'CleanCheckout'],
			[
				$class: 'PreBuildMerge',
				options: [
					fastForwardMode: 'NO_FF',
					mergeRemote: env.gitlabTargetNamespace,
					mergeTarget: env.gitlabTargetBranch
				]
			]
		],
		userRemoteConfigs: [
			[
				credentialsId: credentialsId,
				name: env.gitlabTargetNamespace,
				url: env.gitlabTargetRepoSshURL
			],
			[
				credentialsId: credentialsId,
				name: env.gitlabSourceNamespace,
				url: env.gitlabSourceRepoSshURL
			]
		]
	])
}

node() {
	stage('setup') {
    checkout scm
		sh "env | sort"
		handleCheckout()
		sh "git branch -vv"
	}

	stage('test') {
		sh "echo 'Throw in some tests here'"
	}
}
